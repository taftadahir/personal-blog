<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function (Request $request) {
	$articles = [
		'data' => [
			# [
			# 	'title' => 'Les bases du markdown avec Obsidian',
			# 	'slug' => 'slug',
			# 	'banner' => [
			# 		'name' => '10.jpg'
			# 	],
			# 	'published_at' => '10-02-2022',
			# 	"read_time" => 20
			# ],
			# [
			# 	'title' => 'Les bases du markdown avec Obsidian',
			# 	'slug' => 'slug',
			# 	'banner' => [
			# 		'name' => '10.jpg'
			# 	],
			# 	'published_at' => '10-02-2022',
			# 	"read_time" => 20
			# ],
			[
				'title' => 'Les bases du markdown avec Obsidian',
				'slug' => 'slug',
				'banner' => [
					'name' => '10.jpg'
				],
				'published_at' => '10-02-2022',
				"read_time" => 20
			],
			[
				'title' => 'Les bases du markdown avec Obsidian',
				'slug' => 'slug',
				'banner' => [
					'name' => '10.jpg'
				],
				'published_at' => '10-02-2022',
				"read_time" => 20
			],
			[
				'title' => 'Les bases du markdown avec Obsidian',
				'slug' => 'slug',
				'banner' => [
					'name' => '10.jpg'
				],
				'published_at' => '10-02-2022',
				"read_time" => 20
			]
		]
	];

	$article =
		[
			'title' => 'What is ERC-20 in Blockchain technology?',
			'slug' => 'slug',
			'banner' => [
				'name' => '10.jpg'
			],
			'published_at' => 'August 08, 2022',
			"read_time" => 20,
			'comments' => [],
			'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis risus donec tellus volutpat nisi egestas. Adipiscing amet, morbi pellentesque enim, sit mollis. Nunc eu, pharetra ut vestibulum molestie dolor. Felis ut mauris habitant eget morbi.',
			'content' => '<h2>Heading 2 - Introduction</h2><pre data-src="/storage/assets/test.css"></pre><p>
        On sait depuis longtemps que travailler avec du
        texte lisible et contenant du sens est source de
        distractions, et empêche de se concentrer sur la
        mise en page elle-même. L\'avantage du Lorem Ipsum
        sur un texte générique comme \'Du texte. Du texte. Du
        texte.\' est qu\'il possède une distribution de
        lettres plus ou moins normale, et en tout cas
        comparable avec celle du français standard. De
        nombreuses suites logicielles de mise en page ou
        éditeurs de sites <mark>Web2</mark> ont fait du Lorem Ipsum leur
        faux texte par défaut, et une recherche pour \'Lorem
        Ipsum\' vous conduira vers de nombreux sites qui n\'en
        sont encore qu\'à leur phase de construction.
        Plusieurs versions sont apparues avec le temps,
        parfois par accident, souvent intentionnellement
        (histoire d\'
				</p>
				<p>Du
      texte.\' est qu\'il possède une distribution de
      lettres plus ou moins normale, et en tout cas
      comparable avec celle du français standard. De
      nombreuses suites logicielles de mise en page ou
      éditeurs de sites Web ont fait du Lorem Ipsum leur
      faux texte par défaut, et une recherche pour \'Lorem
      Ipsum\' vous conduira vers de nombreux sites qui n\'en
      sont encore qu\'à leur phase de construction.
      Plusieurs versions sont apparues avec le temps,
      parfois par accident,
      <a href="http://www.google.com" target="_blank">This is a link to
        google</a>
      (histoire d\'y rajouter de petits clins d\'oeil, voire
				des phrases embarassantes).</p><div class="img"> <img src="/storage/assets/10.jpg" alt="Article Image"/> <span>Image alt description</span> </div>
				<h2>Heading 2 - Introduction</h2>
				<p>Du
      texte.\' est qu\'il possède une distribution de
      lettres plus ou moins normale, et en tout cas
      comparable avec celle du français standard. De
      nombreuses suites logicielles de mise en page ou
      éditeurs de sites Web ont fait du Lorem Ipsum leur
      faux texte par défaut, et une recherche pour \'Lorem
      Ipsum\' vous conduira vers de nombreux sites qui n\'en
      sont encore qu\'à leur phase de construction.
      Plusieurs versions sont apparues avec le temps,
      parfois par accident,
      <a href="http://www.google.com" target="_blank">This is a link to
        google</a>
      (histoire d\'y rajouter de petits clins d\'oeil, voire
				des phrases embarassantes).</p>
				<ul>
						<li>List item one</li>
						<li>List item one</li>
						<li>List item one</li>
				<li>List item one</li>
				<li>Items
				<ol>
							<li>Item</li>
						<li>Item</li>
						<li>Item</li>
				<li>Item</li>
				</ol>
				</li>
				</ul>

				<table>
				<thead>
  <tr>
    <th>Company</th>
    <th>Contact</th>
    <th>Country</th>
				</tr>
				</thead>
				<tbody>
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Mexico</td>
  </tr>
  <tr>
    <td>Ernst Handel</td>
    <td>Roland Mendel</td>
    <td>Austria</td>
  </tr>
  <tr>
    <td>Island Trading</td>
    <td>Helen Bennett</td>
    <td>UK</td>
  </tr>
  <tr>
    <td>Laughing Bacchus Winecellars</td>
    <td>Yoshi Tannamuri</td>
    <td>Canada</td>
  </tr>
  <tr>
    <td>Magazzini Alimentari Riuniti</td>
    <td>Giovanni Rovelli</td>
    <td>Italy</td>
				</tr>
				</tbody>
</table>

<figure class="px-8 block">
    <blockquote cite="https://www.huxley.net/bnw/four.html">
        <p>Words can be like X-rays, if you use them properly—they’ll go through anything. You read and you’re pierced.</p>
    </blockquote>
    <figcaption>— Aldous Huxley, <cite>Brave New World</cite></figcaption>
</figure>
				
				'
		];

	return Inertia::render('Single', [
		'article' => $article,
		'articles' => $articles,
		'filters' => $request->only('search')
	]);
})->name('home');

Route::middleware('auth')->group(function () {

	Route::get('/dashboard', function () {
		return Inertia::render('Dashboard');
	})->name('dashboard');
});

Route::get('/single/{article:slug}', function () {
	return 'Single';
})->name('single');

require __DIR__ . '/auth.php';
