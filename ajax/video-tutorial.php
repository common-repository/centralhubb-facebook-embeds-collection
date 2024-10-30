<?php $videoId = !empty($_GET['video_id']) ? $_GET['video_id'] : null; ?>

<iframe width="800" height="600" src="https://www.youtube.com/embed/<?php echo $videoId; ?>?autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
