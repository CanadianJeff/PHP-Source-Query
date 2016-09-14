<?php
	require __DIR__ . '/../SourceQuery/bootstrap.php';

	use xPaw\SourceQuery\SourceQuery;
	
	// Edit this ->
	define( 'SQ_SERVER_ADDR', '' );
	define( 'SQ_SERVER_PORT', 27015 );
	define( 'SQ_SERVER2_ADDR', '' );
	define( 'SQ_SERVER2_PORT', 27015 );
	define( 'SQ_TIMEOUT', 1 );
	define( 'SQ_ENGINE', SourceQuery::SOURCE );

	define( 'TABLE_TH_TR_BGCOLOR', '#141414' );
	define( 'TABLE_TR_BGCOLOR_MATCH', '#141414' );
	define( 'TABLE_TR_BGCOLOR_NOTMATCH', '#141414' );
	define( 'TABLE_TD_FONTCOLOR_VALUE1', '#FF9900' );
	define( 'TABLE_TD_FONTCOLOR_VALUE2', '#FF9900' );
	// Edit this <-
	
	$Query = new SourceQuery( );

	// SERVER INFO TABLE
	try
	{
		$Query->Connect( SQ_SERVER_ADDR, SQ_SERVER_PORT, SQ_TIMEOUT, SQ_ENGINE );
		$array1=$Query->GetInfo( );
	}
	catch( Exception $e )
	{
		echo "[".SQ_SERVER_ADDR.":".SQ_SERVER_PORT."] ".$e->getMessage( );
	}
	finally
	{
		$Query->Disconnect( );
	}

	try
	{
		$Query->Connect( SQ_SERVER2_ADDR, SQ_SERVER2_PORT, SQ_TIMEOUT, SQ_ENGINE );
		$array2=$Query->GetInfo( );
	}
	catch( Exception $e )
	{
		echo "[".SQ_SERVER2_ADDR.":".SQ_SERVER2_PORT."] ".$e->getMessage( );
	}
	finally
	{
		$Query->Disconnect( );
	}

	if (!empty($array1) && !empty($array2)) {
		echo "<link href=\"https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.6/simplex/bootstrap.min.css\" rel=\"stylesheet\">\r\n";
		echo "<table class=\"table table-bordered\"><thead><tr style=\"background-color:".TABLE_TH_TR_BGCOLOR."\"><th class=\"size-2\" style=\"color:white\">CVAR</th><th class=\"size-1\" style=\"color:white\">MATCH?</th><th class=\"size-1\" style=\"color:white\">".SQ_SERVER_ADDR.":".SQ_SERVER_PORT."</th><th class=\"size-1\" style=\"color:white\">".SQ_SERVER2_ADDR.":".SQ_SERVER2_PORT."</th></tr></thead>\r\n";
		echo "<tbody>\r\n";
		foreach ($array1 as $key => $val) {
			if ($array1[$key] == $array2[$key]) {
				echo "\t<tr class=\"attribute\" style=\"background-color:".TABLE_TR_BGCOLOR_MATCH."\"><td class=\"attribute-name-td\" style=\"color:green\">".$key."</td><td class=\"attribute-match-td\"><span class=\"glyphicon glyphicon-ok\"></span></td><td style=\"color:".TABLE_TD_FONTCOLOR_VALUE1."\">".$array1[$key]."</td><td style=\"color:".TABLE_TD_FONTCOLOR_VALUE2."\">".$array2[$key]."</td></tr>\r\n";
			} else {
				echo "\t<tr class=\"attribute\" style=\"background-color:".TABLE_TR_BGCOLOR_NOTMATCH."\"><td class=\"attribute-name-td\" style=\"color:red\">".$key."</td><td class=\"attribute-notmatch-td\"></td><td style=\"color:".TABLE_TD_FONTCOLOR_VALUE1."\">".$array1[$key]."</td><td style=\"color:".TABLE_TD_FONTCOLOR_VALUE2."\">".$array2[$key]."</td></tr>\r\n";
			}
		}
		echo "</tbody>\r\n";
		echo "</table>";
	}

	// SERVER RULES TABLE
	try
	{
		$Query->Connect( SQ_SERVER_ADDR, SQ_SERVER_PORT, SQ_TIMEOUT, SQ_ENGINE );
		$array3=$Query->GetRules( );
	}
	catch( Exception $e )
	{
		echo "[".SQ_SERVER_ADDR.":".SQ_SERVER_PORT."] ".$e->getMessage( );
	}
	finally
	{
		$Query->Disconnect( );
	}

	try
	{
		$Query->Connect( SQ_SERVER2_ADDR, SQ_SERVER2_PORT, SQ_TIMEOUT, SQ_ENGINE );
		$array4=$Query->GetRules( );
	}
	catch( Exception $e )
	{
		echo "[".SQ_SERVER2_ADDR.":".SQ_SERVER2_PORT."] ".$e->getMessage( );
	}
	finally
	{
		$Query->Disconnect( );
	}

	if (!empty($array3) && !empty($array4)) {
		echo "<table class=\"table table-bordered\"><thead><tr style=\"background-color:".TABLE_TH_TR_BGCOLOR."\"><th class=\"size-2\" style=\"color:white\">CVAR</th><th class=\"size-1\" style=\"color:white\">MATCH?</th><th class=\"size-1\" style=\"color:white\">".SQ_SERVER_ADDR.":".SQ_SERVER_PORT."</th><th class=\"size-1\" style=\"color:white\">".SQ_SERVER2_ADDR.":".SQ_SERVER2_PORT."</th></tr></thead>\r\n";
		echo "<tbody>\r\n";
		foreach ($array3 as $key => $val) {
			if ($array3[$key] == $array4[$key]) {
				echo "\t<tr class=\"attribute\" style=\"background-color:".TABLE_TR_BGCOLOR_MATCH."\"><td class=\"attribute-name-td\" style=\"color:green\">".$key."</td><td class=\"attribute-match-td\"><span class=\"glyphicon glyphicon-ok\"></span></td><td style=\"color:".TABLE_TD_FONTCOLOR_VALUE1."\">".$array3[$key]."</td><td style=\"color:".TABLE_TD_FONTCOLOR_VALUE2."\">".$array4[$key]."</td></tr>\r\n";
			} else {
				echo "\t<tr class=\"attribute\" style=\"background-color:".TABLE_TR_BGCOLOR_NOTMATCH."\"><td class=\"attribute-name-td\" style=\"color:red\">".$key."</td><td class=\"attribute-notmatch-td\"></td><td style=\"color:".TABLE_TD_FONTCOLOR_VALUE1."\">".$array3[$key]."</td><td style=\"color:".TABLE_TD_FONTCOLOR_VALUE2."\">".$array4[$key]."</td></tr>\r\n";
			}
		}
		echo "</tbody>\r\n";
		echo "</table>";
	}
?>
