<div class="flex justify-center">

    <div class="w-6/12 p-6 mt-5 bg-white rounded-lg">

        <?php echo validation_errors(); ?>

        <form id = "form_update">

            <input type="hidden" id = "id" value = "<?php echo $post['id'] ?>">

            <div class="mb-4">
                <label for="title" class = "sr-only">Title</label>
                <input type="text" id = "title" name = "title" class = "bg-gray-100 border-2 p-4 w-full rounded-lg" placeholder="Title" value = "<?php echo $post['title']?>">
            </div>

            <div class="mb-4">

                <label for="body" class = "sr-only">Body</label>
                <textarea name="body" id = "body" class = "bg-gray-100 border-2 p-4 w-full rounde-lg"><?php echo $post['body']?></textarea>
            </div>


            <div class="mb-4">
                <button class = "bg-blue-500 w-full px-4 py-3 rounded-lg text-white">Update</button>
            </div>

        </form>

        <div class="mb-4">
            <form id = "form_delete">

                <button class = "bg-red-500 w-full px-4 py-3 rounded-lg text-white">Delete</button>

            </form>
        </div>
        
    </div>
</div>


<script>


    const formUpdate = document.getElementById('form_update')
    const formDelete = document.getElementById('form_delete')
    const url = `http://localhost/ci_crud/`;


    formUpdate.addEventListener('submit' , e => {

        e.preventDefault();

        const id = document.querySelector('#id').value.trim();
        const title = document.querySelector('#title').value.trim();
        const body = document.querySelector('#body').value.trim();

        const data = {id, title, body};

        $.ajax({
            type: "POST",
            url: `${url}posts/update`,
            data: data,
            dataType: "json",
            success: function (response) {
                
                let {success, mesage } = response;

                console.log(response);
                success ? location.replace(`${url}`) : toastr.error(`${message}`);
            }
        });
    });

    formDelete.addEventListener('submit', e => {

        e.preventDefault();

        const id = document.querySelector('#id').value.trim();
        console.log(id);

        

        $.ajax({
            type: "POST",
            url: `${url}posts/destroy`,
            data: {
                id
            },
           // dataType: "json",
            success: function (response) {

                
                let {success, message } = response;

                success ? location.replace(`${url}`) : toastr.error(`${message}`);
            }
        });
    })

</script>