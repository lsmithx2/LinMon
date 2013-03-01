<?php
set_time_limit(0);

// Configuration
include 'config/config.php';

// Version Functions
include 'functions/getVersion.php';
include 'functions/checkVersion.php';

// Debugging Functions
include 'functions/debug.php';

// Stats Functions
include 'functions/loadAvg.php';
include 'functions/memory.php';
include 'functions/misc.php';

echo "LinMon slave version ".getVersion("version")." started \n\n";
echo checkVersion();
debug_collectionInterval($config['debug'], $config['updateinterval']);

while (true){
	debug_collectionInfoStart($config['debug']);
	
	collect_loadAvg($config['debug']);
    collect_memory($config['debug']);
    collect_kernel($config['debug']);
    collect_hostname($config['debug']);
    collect_uptime($config['debug']);
    
	
    debug_collectionInfoEnd($config['debug']);
	sleep($config['updateinterval']);
}
?>