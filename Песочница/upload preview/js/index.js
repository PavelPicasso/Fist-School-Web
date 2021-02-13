/*
    Load 1
*/

function humanFileSize(bytes, si) {
    let thresh = si ? 1000 : 1024;
    if(bytes < thresh) return bytes + ' B';
    let units = si ? ['kB','MB','GB','TB','PB','EB','ZB','YB'] : ['KiB','MiB','GiB','TiB','PiB','EiB','ZiB','YiB'];
    let u = -1;
    do {
        bytes /= thresh;
        ++u;
    } while(bytes >= thresh);
    return bytes.toFixed(1)+' '+units[u];
}


//this function is called when the input loads an image
function renderImage(file) {
    const reader = new FileReader();
    reader.onload = function(event) {
        the_url = event.target.result;
        
        //of course using a template library like handlebars.js is a better solution than just inserting a string
        $('#preview').html("<img src='"+the_url+"' />");
        $('#name').html(file.name);
        $('#size').html(humanFileSize(file.size, "MB"));
        $('#type').html(file.type);
    }

    //when the file is read it triggers the onload event above.
    reader.readAsDataURL(file);
}


//this function is called when the input loads a video
function renderVideo(file) {
    const reader = new FileReader();
    reader.onload = function(event) {
        the_url = event.target.result;
        
        //of course using a template library like handlebars.js is a better solution than just inserting a string
        $('#data-vid').html("<video width='400' controls><source id='vid-source' src='"+the_url+"' type='video/mp4'></video>");
        $('#name-vid').html(file.name);
        $('#size-vid').html(humanFileSize(file.size, "MB"));
        $('#type-vid').html(file.type);
    }

    //when the file is read it triggers the onload event above.
    reader.readAsDataURL(file);
}



//watch for change on the 
$( "#the-photo-file-field" ).change(function() {
    console.log("photo file has been chosen");
    //grab the first image in the fileList
    //in this example we are only loading one file.
    console.log(this.files[0].size);
    renderImage(this.files[0]);

});

$( "#the-video-file-field" ).change(function() {
    console.log("video file has been chosen");
    //grab the first image in the fileList
    //in this example we are only loading one file.
    console.log(this.files[0].size);
    renderVideo(this.files[0]);
});

/*
    Load 2
*/

function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#uploadForm + embed').remove();
            $('#uploadForm').after('<embed src="'+e.target.result+'" width="450" height="300">');
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$("#file").change(function () {
    filePreview(this);
});

/*
    Load 3
*/

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
});