## Fixed interval with Averaging

PHPFiwa source code can be found here: [PHPFiwa.php](https://github.com/emoncms/emoncms/blob/master/Modules/feed/engine/PHPFiwa.php)

The fixed interval with averaging feed engine within emoncms is an extention of the fixed interval engine but instead of one high resolution data layer it produces several additional layers that are lower resolution averages. For example: A time series feed that has a base interval of 10 seconds may then have a 60s average layer, a 10 minute average layer and an hour average layer.

Calculating average layers on the fly like this provides several advantages:

1. If you want 800 datapoints over a month time period you could read directly from the hour layer and rather than being a random datapoint in the base layer the hour layer value will be representative of the hour it represents.

2. With the correct configuration of average layers a historical query can read in a single block from the relevant layer rather than do a multiple step seek-read operation. Reading in one block is faster especially if there is slow network latency or slow harddrive seek times. 

The main disadvantage is that the additional layers require additional disk writes which reduces the write performance.
