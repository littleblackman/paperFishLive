<?php


class HomeController extends Controller
{

    private $storyManager;
    private $sheetManager;


    public function __construct($request) {
        parent::__construct($request);
        $this->storyManager = new StoryManager();
        $this->sheetManager = new SheetManager();
    }

    public function index() {
        return $this->render('home/index');
    }

    public function dashboard() {
        $storysPublic = $this->storyManager->findByVisibility('public');
        $sheetsPublic = $this->sheetManager->findByVisibility('public');
        return $this->render('home/dashboard', ['sheetsPublic' => $sheetsPublic, 'storysPublic' => $storysPublic]);
    }

    public function register() {
        return $this->render('home/register');
    }

    public function login() {
        return $this->render('home/login');
    }
}