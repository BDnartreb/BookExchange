<?php

/**
 * Displays template ordered by controllers. 
 */
class View 
{
    /**
     * Title of the page
     */
    private string $title;
    
    
    /**
     * Constructor. 
     */
    public function __construct($title) 
    {
        $this->title = $title;
    }
    
    /**
     * Return a completed page. 
     * @param string $viewPath : path of the templates ordered by the controller. 
     * @param array $params : params for the controller.
     * @return string
     */
    public function render(string $viewName, array $params = []) : void 
    {
        $viewPath = $this->buildViewPath($viewName);
        
        // params used by the main template "main.php" that defines the structure of all pages
        $content = $this->_renderViewFromTemplate($viewPath, $params);
        $title = $this->title;
        if($_SESSION){
            ob_start();
            require(MAINSESSION_VIEW_PATH);
            echo ob_get_clean();
        } else {
            ob_start();
            require(MAIN_VIEW_PATH);
            echo ob_get_clean();
        }
    }
    
    /**
     * Create a view from a template. 
     * @param $viewPath : path ordered by the controller.
     * @param array $params : params sent by the controller to the template.
     * @throws Exception : if template doesn't exist.
     * @return string : content of the view.
     */
    private function _renderViewFromTemplate(string $viewPath, array $params = []) : string
    {  
        if (file_exists($viewPath)) {
            extract($params); // extracts data form the array "params" to transofme them in variables readable by the template.
            ob_start();
            require($viewPath);
            return ob_get_clean();
        } else {
            throw new Exception("La vue '$viewPath' est introuvable.");
        }
    }

    /**
     * Builds the path to the template
     * @param string $viewName.
     * @return string : path to the template.
     */
    private function buildViewPath(string $viewName) : string
    {
        return TEMPLATE_VIEW_PATH . $viewName . '.php';
    }
}



