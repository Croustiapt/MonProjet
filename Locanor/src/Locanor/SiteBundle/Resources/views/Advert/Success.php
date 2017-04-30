{% extends "::layout.html.twig" %}

{% block title %}{{ parent() }}- Success{% endblock %}

{% block body %}


<div class="alert alert-success">
  <strong class="text-center">Success!</strong> Vôtre reservation à été pris en compte.
</div>

{% endblock %}