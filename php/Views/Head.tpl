<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">

    <title>{$title}</title>
    {if $description}
    <meta name="description" content="{$description}">
    {else}
    <meta name="description" content="Omega template web site">
    {/if}
    
    {if $keywords}
    <meta name="keywords" content="{$keywords}">
    {else}
    <meta name="keywords" content="Omega template web site">
    {/if}
    
    <meta name="author" content="mmmaxou alexandre">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{$root_url}bootstrap/css/bootstrap.css">

    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:300,400,700" rel="stylesheet">

    <!-- List of CSS Link-->
    <link rel="stylesheet" type="text/css" href="{$root_url}css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{$root_url}lib/toastr/build/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="{$root_url}css/reset.css">
    <link rel="stylesheet" type="text/css" href="{$root_url}css/component.css">
    <link rel="stylesheet" type="text/css" href="{$root_url}css/layout.css">
    <link rel="stylesheet" type="text/css" href="{$root_url}css/page.css">
    <link rel="stylesheet" type="text/css" href="{$root_url}css/theme.css">
    <link rel="stylesheet" type="text/css" href="{$root_url}css/utils.css">
    <link rel="stylesheet" type="text/css" href="{$root_url}css/value.css">
</head>
