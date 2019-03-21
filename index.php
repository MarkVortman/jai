<?php
#------------------------------------------------------------
# Register The Auto Loader
#------------------------------------------------------------
#
# For using program we need connect our core classes, so,
# loader can make it easy.
#

require __DIR__.'/core/loader.php';

#------------------------------------------------------------
# Initialize the App
#------------------------------------------------------------
#
# Now we need create app object and initialize main process, 
# which in turn other importants processes.
#

$app = new App();
$app->init();
echo '#done <- from index#';