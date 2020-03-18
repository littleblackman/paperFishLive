<?php


class StoryController extends Controller
{

    public function __construct($request) {
        parent::__construct($request);
        $this->storyManager = new StoryManager();
    }

    public function index() {
        $storysUser   = $this->storyManager->findByUser($this->session->getUserId());
        $storysPublic = $this->storyManager->findByVisibility('public');
        $this->render('story/index', ['storysUser' => $storysUser, 'storysPublic' => $storysPublic]);
    }

    public function create() {
        $story = new Story();
        $this->render('story/create', ['story' => $story]);
    }

    public function edit() {
        $story = $this->storyManager->findBySlug($this->request->get('slug'));
        $this->render('story/create', ['story' => $story]);
    }

    public function show() {
        $story = $this->storyManager->findBySlug($this->request->get('slug'));
        $this->render('story/show', ['story' => $story]);
    }

    public function themeJsonList() {
        $themeManager = new ThemeManager();
        $themesArray = $themeManager->findByString($this->request->get('myString'));
        return $this->renderJson($themesArray);
    }

    public function genreJsonList() {
        $genreManager = new GenreManager();
        $genresArray = $genreManager->findByString($this->request->get('myString'));
        return $this->renderJson($genresArray);
    }

    public function update() {
        $storyData = $this->request->get('data');
        $authorData = $this->request->get('author');
        $directorData = $this->request->get('director');

        if ($storyData['type'] == "litterature") {
            $author = new Author($authorData);
            $author = $author->save();
            $storyData['author'] = $author;
        } else {
            $director = new Director($directorData);
            $director = $director->save();
            $storyData['director'] = $director;
        }
        $story = new Story($storyData);

        ($story->getId()) ? $text = "modifié" : "créé";
        $story = $story->save();

        if(!$story) {
            // error
        } else {
            $this->session->setFlashMessage('Yes, votre récit est '.$text, "success");
            $this->redirect('story');
        }
    }

}