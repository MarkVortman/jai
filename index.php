<?php
#------------------------------------------------------------
# Register The Auto Loader
#------------------------------------------------------------
#
# For using program we need connect our core classes, so,
# loader can make it easy.
#

require_once __DIR__.'/loader.php';

#------------------------------------------------------------
# Load Classes
#------------------------------------------------------------
#
# Now we load out application core.
#

Loader::init('core');

#------------------------------------------------------------
# Initialize the App
#------------------------------------------------------------
#
# Now we need create app object and initialize main process, 
# which in turn other importants processes.
#

$app = new App();
$app->init();

//echo '<br><hr>#done <- from index#';
