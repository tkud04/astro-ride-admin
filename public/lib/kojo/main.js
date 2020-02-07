/*
Big Thanks To:
https://developer.mozilla.org/en-US/docs/Rich-Text_Editing_in_Mozilla#Executing_Commands
*/

let sll = 0;

$('a.kojo').click(function(e) {
	let eid = $(this).data('eid');
	
  switch($(this).data('role')) {
    case 'h1':
    case 'h2':
    case 'p':
      document.execCommand('formatBlock', false, $(this).data('role'));
      break;
    default:
      document.execCommand($(this).data('role'), false, null);
      break;
    }
  
})

$('.editor').bind('blur keyup paste copy cut mouseup', function(e) {
  update_output('description',$(this).data('eid'));
});

