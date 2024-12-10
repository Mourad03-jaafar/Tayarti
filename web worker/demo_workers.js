//The script is stored in the "demo_workers.js" file:
//Now this is the code that we provide to count :

var i = 0 ;

function timedCount(){
    i = i + 1;//or i++;
    postMessage(i);//postMessage() method - which is used to post a message back to the HTML page.
    setTimeout("timedCount()", 500);
}

timedCount();

/*Normally web workers are not used for such simple scripts,
 but for more CPU intensive tasks.*/
