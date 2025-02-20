<!DOCTYPE html>
<html>
<title>Play Audio</title>
<body>

@if(strlen($recording_file) > 0)

    <div style="width:400px; height:80px; margin:0 auto;">
        <audio controls>
            <source src="<?php if(isset($file)) echo $file;?>" type="audio/wav">
            Your browser does not support the audio element OR no audio file for this conversation.
        </audio>
    </div>

@else
    <div style="width:400px; height:80px; margin:0 auto;">
        No recording files found !
    </div>
@endif

</body>
</html>
