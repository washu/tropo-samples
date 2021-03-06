<?php

answer();

// ask for a single digit

$result=prompt( "Hello.  Please enter any single digit", array( "choices" => "[1 DIGIT]" ) );

if ($result->name=='choice') say( "Great, you said " . $result->value ) ;


// ask for a 5 digit long ZIP code

$result=prompt( "Hello.  Please enter your 5 digit ZIP code", array( "choices" => "[5 DIGITS]" ) );

if ($result->name=='choice') say( "Great, you said " . $result->value ) ;


// Digits work with speech or touch-tone input...

$result=prompt( "Hello.  Please say or enter your 5 digit ZIP code", array( "choices" => "[5 DIGITS]" ) );

if ($result->name=='choice') say( "Great, you said " . $result->value ) ;

	
// ask for 1 to 6 digit long an account ID

$result=prompt( "Please enter your account ID followed by the pound key.", array( "choices" => "[1-6 DIGITS]" ) );

if ($result->name=='choice') say( "Great, you said " . $result->value ) ;

	
// ask for a US phone number (7 digits without area code, 10 digits with)
	
$result=prompt( "Please enter your 7 to 10 digit U.S. phone number", array( "choices" => "[7-10 DIGITS]" ) );

if ($result->name=='choice') say( "Great, you said " . $result->value ) ;


// digit collection also supports all other prompt properties and event handlers
 _log( "$***********************result name " . $result->name );

while( $result->name != 'hangup' )
{

  // collect 3 digits.  Reprompt up to 3 times.  Use a 7 second timeout...

  $result=prompt( "Now please enter a number between 1 and 999", 
					array(
        				"choices"  => "[1-3 DIGITS]", "repeat" => 3, "timeout" => 7,
  					  	"onBadChoice" => create_function( '$event', 'say("I am sorry, I did not understand what you said.");' ),
					  	"onTimeout"   => create_function( '$event', 'say("I am sorry.  I didn\'t hear anything.");' )

					)
				);

  _log( "$result name " . $result->name );
  _log( "number is " . $result->value );

  if ($result->name=='choice') say( "Great, you said " . $result->value );

}

hangup();

?>
