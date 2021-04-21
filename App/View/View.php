<?php

class View 
{
    // Name of the file linked to the view
    private $file;
    // Name of the title - defined in the view file
    private $title;

    public function __construct($route)
    {
        $this->file = "App\View\\".$route."View.php";
    }

    // Put together the elements of the view
    public function render($data = null)
    {
        // Put together the template with customed content
        $content = $this->getContent($this->file, $data);

        // Assemble the customed content to the generic layout
        $finalView = $this->getContent("App\View\Layout.php", array("title"=> $this->title, "content" => $content));

        echo $finalView;
    }

    // Get the content to build the view
    private function getContent($file, $data)
    {
        if(file_exists($file))
        {
            extract($data);

            ob_start();

            require $file;

            return ob_get_clean();
        }
        else
        {
            throw new Exception("Le fichier ". $file . " est introuvable.");
        }
    }
}
?>