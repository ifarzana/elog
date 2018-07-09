<?php

/* @Twig/Exception/exception.json.twig */
class __TwigTemplate_99d8daa372241de0305832862d1a2b5fbdd54545d42458be804a066ae3d7a791 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_a3b201b241f301b7a420f5130dab36f18136f84c0b42e85df97b5e37368d6236 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_a3b201b241f301b7a420f5130dab36f18136f84c0b42e85df97b5e37368d6236->enter($__internal_a3b201b241f301b7a420f5130dab36f18136f84c0b42e85df97b5e37368d6236_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception.json.twig"));

        $__internal_b46d37958ff0d6d36f8ec7ea5b62a31cdeb415cd04ef470f9bae3dda7e8ba400 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b46d37958ff0d6d36f8ec7ea5b62a31cdeb415cd04ef470f9bae3dda7e8ba400->enter($__internal_b46d37958ff0d6d36f8ec7ea5b62a31cdeb415cd04ef470f9bae3dda7e8ba400_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception.json.twig"));

        // line 1
        echo twig_jsonencode_filter(array("error" => array("code" => ($context["status_code"] ?? $this->getContext($context, "status_code")), "message" => ($context["status_text"] ?? $this->getContext($context, "status_text")), "exception" => $this->getAttribute(($context["exception"] ?? $this->getContext($context, "exception")), "toarray", array()))));
        echo "
";
        
        $__internal_a3b201b241f301b7a420f5130dab36f18136f84c0b42e85df97b5e37368d6236->leave($__internal_a3b201b241f301b7a420f5130dab36f18136f84c0b42e85df97b5e37368d6236_prof);

        
        $__internal_b46d37958ff0d6d36f8ec7ea5b62a31cdeb415cd04ef470f9bae3dda7e8ba400->leave($__internal_b46d37958ff0d6d36f8ec7ea5b62a31cdeb415cd04ef470f9bae3dda7e8ba400_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception.json.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  25 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{{ { 'error': { 'code': status_code, 'message': status_text, 'exception': exception.toarray } }|json_encode|raw }}
", "@Twig/Exception/exception.json.twig", "C:\\xampp7\\htdocs\\elog\\vendor\\symfony\\symfony\\src\\Symfony\\Bundle\\TwigBundle\\Resources\\views\\Exception\\exception.json.twig");
    }
}
