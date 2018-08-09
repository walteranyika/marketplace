<script>
    Dropzone.autoDiscover = false;
    var drop = new Dropzone('#file',  {
        createImageThumbnails:false,
        addRemoveLinks:true,
        url: '{{route('upload.store',$file)}}',
        headers:{
            'X-CSRF-TOKEN':document.head.querySelector('meta[name="csrf-token"]').content
        }
    });

    @foreach($file->uploads as $upload)
      drop.emit('addedfile', {
        id:'{{$upload->id}}',
        name:'{{$upload->filename}}',
        size:'{{$upload->size}}'
      })
    @endforeach


    drop.on('removedfile',function (file) {
       console.log(file);
       axios.delete('/{{$file->identifier}}/upload/'+file.id).catch(
           function (error) {
               drop.emit('addedfile', {
                   id:file.id,
                   name:file.name,
                   size:file.size
               })
           }
       )

    });

    drop.on('success',function (file, response) {
        file.id = response.id
        console.log(file.id)
    });
</script>