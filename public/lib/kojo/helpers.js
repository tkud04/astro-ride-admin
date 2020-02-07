function update_output(el,eid) {
$(`#${el}`).val($(".editor[data-eid=" + eid + "]").html());
//alert($(".editor[data-eid=" + sll + "]").html());
console.log("current value: " + $(`#${el}`).val());
}

function addEditor(el, ex,n=""){
let max =23, min = 99999;
let r = Math.floor(Math.random() * (+max - +min)) + +min; 
sll = r;
let hh = `
<!---------------Editor------------------->
     <div class="editControls">                    	
      <div>
        <a class="kojo" data-eid="${r}" data-role='undo' href='javascript:void(0)'><i class='fa fa-undo'></i></a>
        <a class="kojo" data-eid="${r}" data-role='redo' href='javascript:void(0)'><i class='fa fa-repeat'></i></a>
        <a class="kojo" data-eid="${r}" data-role='bold' href='javascript:void(0)'><i class='fa fa-bold'></i></a>
        <a class="kojo" data-eid="${r}" data-role='italic' href='javascript:void(0)'><i class='fa fa-italic'></i></a>
        <a class="kojo" data-eid="${r}" data-role='underline' href='javascript:void(0)'><i class='fa fa-underline'></i></a>
        <a class="kojo" data-eid="${r}" data-role='strikeThrough' href='javascript:void(0)'><i class='fa fa-strikethrough'></i></a>
        <a class="kojo" data-eid="${r}" data-role='justifyLeft' href='javascript:void(0)'><i class='fa fa-align-left'></i></a>
        <a class="kojo" data-eid="${r}" data-role='justifyCenter' href='javascript:void(0)'><i class='fa fa-align-center'></i></a>
        <a class="kojo" data-eid="${r}" data-role='justifyRight' href='javascript:void(0)'><i class='fa fa-align-right'></i></a>
        <a class="kojo" data-eid="${r}" data-role='justifyFull' href='javascript:void(0)'><i class='fa fa-align-justify'></i></a>
        <a class="kojo" data-eid="${r}" data-role='indent' href='javascript:void(0)'><i class='fa fa-indent'></i></a>
        <a class="kojo" data-eid="${r}" data-role='outdent' href='javascript:void(0)'><i class='fa fa-outdent'></i></a>
        <a class="kojo" data-eid="${r}" data-role='insertUnorderedList' href='javascript:void(0)'><i class='fa fa-list-ul'></i></a>
        <a class="kojo" data-eid="${r}" data-role='insertOrderedList' href='javascript:void(0)'><i class='fa fa-list-ol'></i></a>
        <a class="kojo" data-eid="${r}" data-role='h1' href='javascript:void(0)'>h<sup>1</sup></a>
        <a class="kojo" data-eid="${r}" data-role='h2' href='javascript:void(0)'>h<sup>2</sup></a>
        <a class="kojo" data-eid="${r}" data-role='p' href='javascript:void(0)'>p</a>
        <a class="kojo" data-eid="${r}" data-role='subscript' href='javascript:void(0)'><i class='fa fa-subscript'></i></a>
        <a class="kojo" data-eid="${r}" data-role='superscript' href='javascript:void(0)'><i class='fa fa-superscript'></i></a>
      </div>
    </div>
    
    <div class='editor' id="${ex}" data-eid="${r}" contenteditable>
      <b>Enter text here </b>
      
    </div> 
	 
`;
el.html(hh);
}