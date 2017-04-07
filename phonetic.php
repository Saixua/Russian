<?php 


/* a 	  	a in car; u in cut 	ah
б 	  	b in bit 	b
в 	  	v in vine 	v
г 	  	g in go 	g
д 	  	d in do 	d
e 	  	ye in yet 	yeh
ё 	  	yo in yolk 	yo
ж 	  	s in measure 	zh
з 	  	z in zoo 	z
и 	  	ee in see 	ee
й 	  	y in boy 	y
к 	  	k in kiss 	k
л 	  	l in lady 	l
м 	  	m in mist 	m
н 	  	n in not 	n
o 	  	o in folk 	o
п 	  	p in pipe 	p
р 	  	trilled r in rrroll 	r
с 	  	s in soft 	s
т 	  	t in tie 	t
y 	  	oo in root 	oo
ф 	  	f in farm 	f
х 	  	ch in Scottish loch 	kh
ц 	  	ts in lists 	ts
ч 	  	ch in chapter 	ch
ш 	  	sh in shut 	sh
щ 	  	sh in sheep 	shch
ъ 	  	is used to separate
two parts of the word 	'
ы 	  	i in ill 	i
ь 	  	is used to make the
preceding consonant soft 	'
э 	  	e in net 	eh
ю 	  	u in use 	yoo
я 	  	ya in yard 	yah */

	 function phonetics($word, $i){
	$strbuild = "";	
	
	$sounds = array("а" => "ah",
					"б" => "b",
					"в" => "v",
					"г" => "g",
					"д" => "d",
					"е" => "ye",
					"ё" => "yo",
					"ж" => "zh",
					"з" => "z",
					"и" => "ee",
					"й" => "y",
					"к" => "k",
					"л" => "l",
					"м" => "m",
					"н" => "n",
					"о" => "o",
					"п" => "p",
					"р" => "rra",
					"с" => "s",
					"т" => "t",
					"y" => "oo",
					"ф" => "f",
					"х" => "kh",
					"ц" => "ts",
					"ч" => "ch",
					"ш" => "sh",
					"щ" => "shch",
					"э" => "eh",
					"ю" => "yoo",
					"я" => "yah",
					"ь" => "'");

					
					$combo=["ай","яй","ой","ей","уй","юй"];
					 
					$combo2=["igh","yigh","oy","yay","ooy","yooy"];
					 

        $cyr = [
            'а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п',
            'р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я',
            'А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П',
            'Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я'
        ];
        $lat = [
            'a','b','v','g','d','e','io','zh','z','i','y','k','l','m','n','o','p',
            'r','s','t','u','f','h','ts','ch','sh','sht','a','i','y','e','yu','ya',
            'A','B','V','G','D','E','Io','Zh','Z','I','Y','K','L','M','N','O','P',
            'R','S','T','U','F','H','Ts','Ch','Sh','Sht','A','I','Y','e','Yu','Ya'
        ];
	 if($i == 0){
		  $strbuild= str_replace($combo, $combo2, $word);
		  $strbuild= str_replace($cyr, $sounds, $strbuild);
		  return $strbuild;
	 }
	
		
		
		return  str_replace($cyr, $lat, $word);
		
		
	}
	
?>