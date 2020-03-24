<?php


class SheetController extends Controller
{
    private $sheetManager;
    private $topicManager;
    private $gradeManager;

    public function __construct($request) {
        parent::__construct($request);
        $this->sheetManager = new SheetManager();
        $this->topicManager = new TopicManager();
        $this->gradeManager = new GradeManager();
    }
    
    public function index() {
        $sheetsUser   = $this->sheetManager->findByUser($this->session->getUserId());
        $sheetsPublic = $this->sheetManager->findByVisibility('public');
        $this->render('sheet/index', ['sheetsUser' => $sheetsUser, 'sheetsPublic' => $sheetsPublic]);
    }

    public function create() {
        $sheet = new Sheet();
        $topics = $this->topicManager->findAll();
        $grades = $this->gradeManager->findAll();
        $this->render('sheet/create', ['sheet' => $sheet, 'topics' => $topics, 'grades' => $grades]);
    }

    public function show() {
        $sheet = $this->sheetManager->findBySlug($this->request->get('slug'));
        if($sheet->getVisibility() == "private" && !$this->isOwner($sheet)) return $this->redirect('403');
        $this->session->setTitlePage($sheet->getTitle().' sur PaperFish');
        $this->session->setDescriptionPage('Fiche révision et définitions - '.$sheet->getTitle().' - '.$sheet->getDescription());        
        $this->render('sheet/show', ['sheet' => $sheet]);
    }

    public function update() {
        $sheet = new Sheet($this->request->get('sheet'));
        $sheet = $sheet->save();
        $this->renderJson($sheet->toArray());
    }

    public function edit() {
        $sheet = $this->sheetManager->findBySlug($this->request->get('slug'));
        if(!$this->isOwner($sheet)) return $this->redirect('403');
        $topics = $this->topicManager->findAll();
        $grades = $this->gradeManager->findAll();
        $this->render('sheet/create', ['sheet' => $sheet, 'topics' => $topics, 'grades' => $grades]);
    }
}