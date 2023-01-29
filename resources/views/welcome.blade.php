<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
	<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
</head>
<body>
	<section id="start-page">
		<h1>MakanCare</h1>
		<h2>Let's have some fun!</h2>
		<button onclick="window.location.href='/login'">Explore</button>
	</section>

	
</body>
</html>

<style>/* Default Page */
body{
	background-color: brown;
	font-family: 'Oswald', sans-serif;
	text-align: center;
	color: #FFF;
}

button{
	background-color: #2b2b2b;
	font-family: 'Oswald', sans-serif;
	font-size: 1.25em;
	font-weight: 400;
	text-transform: uppercase;
	border: 2px solid #FFF;
	border-radius: 4px;
	padding: 12px 44px 12px 44px;
	color: #FFF;
	-webkit-transition: color 0.5s, background-color 0.5s;
	transition: color 0.5s, background-color 0.5s;
	cursor: pointer;
}

button:hover{
	background-color: #FFF;
	color: #2b2b2b;
}

#page-1, #page-2, #page-3, #page-4, #page-5, #finish{
	display: none;
}

/* Start Page */
#start-page{
	max-width: 100%;
	max-height: 100%;
	margin-top: 18%;
}

#start-page > h1{
	font-size: 3.3em;
	font-weight: 400;
	text-transform: uppercase;
}

#start-page > h2{
	font-size: 1.25em;
	font-weight: 300;
	margin: 15px 0 20px 0;
}

/* pages */
.page{
	font-size: 1.125em;
	font-weight: 300;
}

.page > h1{
	font-size: 3em;
	font-weight: 400;
	text-transform: uppercase;
	margin: 40px 0 40px 0;
}

.page > .charName{
	font-size: 1.5em;
	font-weight: 400;
	margin: 20px 0 20px 0;
}

.page input{
	margin: 8px 0 8px 0;
}

.page input:last-child{
	margin-bottom: 30px;
}

/* Finish */
#finish{
	background-color: #FFF;
	width: 780px;
	height: 315px;
	margin: 0 auto;
	margin-top:14%;
	border-radius: 6px;
	font-size: 3em;
	font-weight: 300;
	text-transform: uppercase;
	color: #2b2b2b;
}

#finish > h1{
	font-size: 60pt;
	font-weight: 400;
	padding-top: 5%;
}

#finish > p{
	margin: 20px 0 20px 0;
}

#finish > button{
	background-color: #FFF;
	font-size: 18pt;
	font-weight: 400;
	color: #2b2b2b;
	border: 2px solid #2b2b2b;
}

#finish > button:hover{
	background-color: #2b2b2b;
	color: #FFF;
}</style>