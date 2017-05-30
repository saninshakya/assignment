<?php
$data['post']= array(
	'title' => "Let's see this awesome post!",
	'message' =>"I'm really glad to see this forums popular!",
	'datetime' => '1 week ago',
	'bannerImage' =>'img\img1.png'
	);
$data['author']= array(
	'authorName' => 'Jason Bourne',
	'userType' => 'Registered User',
	'address' => 'New York',
	'profilePic' => 'http://placehold.it/140x100'
	);
$datas[] = $data;
$data['post']= array(
	'title' => 'When will the concert be held?',
	'message' =>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.",
	'datetime' => '2 weeks ago',
	'bannerImage' =>'img\img2.png'
	);
$data['author']= array(
	'authorName' => 'Linus Torvalds',
	'userType' => 'Registered User',
	'address' => 'Oregon',
	'profilePic' => 'http://placehold.it/140x100'
	);

$datas[] = $data;
$data['post']= array(
	'title' => 'Granda plays GTA',
	'message' =>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.",
	'datetime' => '2 weeks ago',
	'bannerImage' =>'img\img3.png'
	);
$data['author']= array(
	'authorName' => 'Zlatan Ibrahimović',
	'userType' => 'Moderator',
	'address' => 'Sweden',
	'profilePic' => 'http://placehold.it/140x100'
	);

$datas[] = $data;
$json = json_encode($datas);
echo $json;