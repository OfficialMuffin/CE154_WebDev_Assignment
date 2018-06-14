<?php 

$student_inventory = [
	#Books
	'INSERT INTO inventory VALUES (
	"AA01-005",
	"Star Wars: Phasma",
	"Discover Captain Phasmas mysterious history in this Journey to Star Wars: The Last Jedi novel.",
	"Delilah S.Dawson",
	"aa01-005.jpg",
	1001,
	9.99 ,
	"Southend",
	3,
	10 );',
	'INSERT INTO inventory VALUES (
	"AA01-006",
	"Star Wars: The Last Jedi",
	"This official adaptation of Star Wars: The Last Jedi movie.",
	"Jason Fry",
	"aa01-006.jpg",
	1001,
	6.99 ,
	"Colchester",
	5,
	11 );',

	#Music
	'INSERT INTO inventory VALUES (
	"AA01-011",
	"Now Thats What I Call Music 98",
	"Rock & Pop",
	"Variable Artists",
	"aa01-011.jpg",
	1002,
	12.99 ,
	"Colchester",
	10,
	5 );',
	'INSERT INTO inventory VALUES (
	"AA01-012",
	"Divide",
	"Third studio album from the English singer-songwriter which debuted in the UK Albums Chart at #1.",
	"Ed Sheeran",
	"aa01-012.jpg",
	1002,
	12.99 ,
	"Southend",
	12,
	7 );',

	#Games
	'INSERT INTO inventory VALUES (
	"AA01-017",
	"Star Wars battlefront II (2017)",
	"Embark on an all-new Battlefront experience from the bestselling Star Wars HD game franchise of all time.",
	"Electronic Arts",
	"aa01-017.jpg",
	1003,
	49.99 ,
	"Southend",
	15,
	8 );',
	'INSERT INTO inventory VALUES (
	"AA01-018",
	"Destiny 2",
	"From the makers of the acclaimed hit game Destiny, comes the much-anticipated sequel. An action shooter that takes you on an epic journey",
	"Bungie",
	"aa01-018.jpg",
	1003,
	44.99 ,
	"Colchester",
	12,
	6 );',

	#DVD
	'INSERT INTO inventory VALUES (
	"AA01-023",
	"Dunkirk",
	"Christopher Nolan writes and directs this war drama that tells the story of the Dunkirk evacuation during the Second World War.",
	"Warner Bros",
	"aa01-023.jpg",
	1004,
	12.99 ,
	"Southend",
	15,
	7 );',
	'INSERT INTO inventory VALUES (
	"AA01-024",
	"Victoria and Abdul",
	"Judi Dench and Eddie Izzard star in this historical drama directed by Stephen Frears.",
	"Universal Pictures",
	"aa01-024.jpg",
	1004,
	7.99 ,
	"Colchester",
	12,
	5 );',

];

# The above adds two hypothetical books to your database. You need to change
# this so that it adds your two books, two CDs two DCDs and two games.
#
# Not that each INSERT is a single-quote delimited string, ends in a semi-colon
# and has commas between the arguments.

?>