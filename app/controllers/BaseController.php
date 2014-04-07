<?php

class BaseController extends Controller {



  protected $route;

  protected $layout;

  protected $redirectPath = null;

  protected $skipView = false;

  protected $hasView = false;

  /**
   * Layouts array
   *
   * @var string[] $layouts Array of layout templates
   */
  protected $layoutOptions = array(
    'default' => 'layouts.default',
    'ajax'    => 'layouts.ajax',
  );

  /**
   * Create a new Controller instance.
   * Assigns the active user
   *
   * @return void
   */
  public function __construct(){
	$this->afterFilter(function($route, $request, $response){
		//$this->layout->with('content', $response->getContent());
		dd($response->getContent());

		$response->setContent($this->layout->with('content', $response->getContent()));
	});
  }

  /********************************************************************
   * Templating
   *******************************************************************/
  protected function cleanRoute($route, $returnArray = false)
  {
    // Format a proper route for view to use

    $route         = str_replace('_', '.', $route);
    $routeParts    = explode('@', $route);
    $routeParts[1] = preg_replace('/^get/', '', $routeParts[1]);
    $routeParts[1] = preg_replace('/^post/', '', $routeParts[1]);
    $route         = strtolower(str_replace('Controller', '', implode('.', $routeParts)));

    if ($returnArray) {
      $routeParts	= explode('.', $route);
    }

    // If the route still does not exist, throw a 404
    if (!View::exists($route)) {
      if (Config::get('app.debug') == false) {
        App::abort(404);
      }
    }

    return $route;
  }

  public function missingMethod($parameters = array())
  {
    $route = Route::currentRouteAction();

    $route = str_replace('missingMethod', $method, $route);

    $this->route = $this->cleanRoute($route);
  }

  /**
   * Master template method
   * Sets the template based on location and passes variables to the view.
   *
   * @return void
   */
  public function setupLayout()
  {
    if ($this->route == null) {
      $route       = Route::currentRouteAction();
      $this->route = $this->cleanRoute($route);
    }

    if ( is_null($this->layout) ) {
      if ( Request::ajax()) {
        $this->layout = View::make($this->layoutOptions['ajax']);
      } else {
        $this->layout = View::make($this->layoutOptions['default']);
      }
    } else {
      $this->layout = View::make($this->layout);
    }
  }
}