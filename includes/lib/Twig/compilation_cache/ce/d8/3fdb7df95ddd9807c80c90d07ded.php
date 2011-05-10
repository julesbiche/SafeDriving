<?php

/* accueil.html */
class __TwigTemplate_ced83fdb7df95ddd9807c80c90d07ded extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<h1>Accueil</h1>";
    }

    public function getTemplateName()
    {
        return "accueil.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
