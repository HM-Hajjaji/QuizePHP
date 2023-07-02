<?php

namespace Core\Http;

class Route extends CoreHttp
{
    public function __construct(Request $request,Response $response)
    {
        parent::__construct($request,$response);
    }

    /**
     * the function for access to url by method get
     * @param string $path
     * @param string $url
     * @param array|callable $action
     * @return $this
     */
    public function get(string $path, string $url, array|callable $action):self
    {
        $this->handler($path,$url,$action,"get");
        return $this;
    }

    /**
     * the function for access to url by method post
     * @param string $path
     * @param string $url
     * @param array|callable $action
     * @return $this
     */
    public function post(string $path,string $url,array|callable $action):self
    {
        $this->handler($path,$url,$action,"post");
        return $this;
    }

    /**
     * the function for access to url by method get and post
     * @param string $path
     * @param string $url
     * @param array|callable $action
     * @return $this
     */
    public function match(string $path,string $url,array|callable $action):self
    {
        $this->get($path,$url,$action)->post($path,$url,$action);
        return $this;
    }

    /**
     * the function for run result of url
     * @return void
     */
    public function resolve():void
    {
        $this->execute($this->request->getMethod(),$this->request->getURL());
    }
}