<!DOCTYPE html>
<html>
<head>
	<title>LBS WIKI</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?=base_url()?>/public/css/style.css">
</head>

<body>

<div class="book without-animation with-summary font-size-2 font-family-1" data-basepath=".">
    <div class="book-summary">
    	<nav role="navigation">
			<ul class="summary">

				<li><a href="#">LBS WIKI</a></li>

				<li class="divider"></li>

				<?php $CI->load->view('template/menu',$data); ?>

			</ul>
		</nav>
    </div>

    <div class="book-body fixed">
		<div class="body-inner">
			<div class="book-header fixed" role="navigation" style="background-color: rgb(255, 255, 255);">

				<a class="btn pull-left js-toolbar-action" aria-label="Toggle Sidebar" title="Toggle Sidebar" href="#"><i class="fa fa-align-justify"></i></a><a class="btn pull-left js-toolbar-action" aria-label="Search" title="Search" href="#"><i class="fa fa-search"></i></a>

				<a class="btn pull-right js-toolbar-action" aria-label="Facebook" title="Facebook" href="#"><i class="fa fa-facebook"></i></a><a class="btn pull-right js-toolbar-action" aria-label="Twitter" title="Twitter" href="#"><i class="fa fa-twitter"></i></a>
				<div class="dropdown pull-left font-settings js-toolbar-action"><a class="btn toggle-dropdown" aria-label="Font Settings" title="Font Settings" href="#"><i class="fa fa-font"></i></a>
					<div class="dropdown-menu dropdown-right">
						<div class="dropdown-caret">
							<span class="caret-outer"></span><span class="caret-inner"></span></div>
						<div class="buttons">
							<button class="button size-2 font-reduce">A</button><button class="button size-2 font-enlarge">A</button>
						</div>
						<div class="buttons">
							<button class="button size-2 ">Serif</button><button class="button size-2 ">Sans</button>
						</div>
						<div class="buttons">
							<button class="button size-3 ">White</button><button class="button size-3 ">Sepia</button><button class="button size-3 ">Night</button>
						</div>
					</div>
				</div>

				<a class="btn pull-left js-toolbar-action" aria-label="Edit" title="Edit" href="#"><i class="fa fa-edit"></i></a><a class="btn pull-left js-toolbar-action" aria-label="Information about the toolbar" title="Information about the toolbar" href="#"><i class="fa fa-info"></i></a>

				<h1>
		        	<i class="fa fa-circle-o-notch fa-spin"></i><a href="./">Introduction to Data Science</a>
		        </h1>
        	</div>

	        <div class="page-wrapper" tabindex="-1" role="main">
	          <div class="page-inner">
	            <section class="normal" id="section-">