
    <div class="flex justify-center">

        <div class="w-4/12 bg-white p-6 rounded-lg">

            <form id = "form">

                <div class="mb-4">
                    <label for="title" class = "sr-only">Title</label>
                    <input type="text" name = "title" id = "title" class = "w-full border-2 p-4 rounded-lg bg-gray-200" placeholder="title">
                </div>

                <div class="mb-4">
                    <textarea name="body" id = "body" class = "w-full border-2 p-4 rounded-lg bg-gray-200" placeholder="Body"></textarea>
                </div>

                <div class="mb-4">
                    <button class = "bg-blue-500 w-full py-3 px-4 text-white rounded-lg">SAVE</button>
                </div>
            </form>
        </div>
    </div>

    <script>

        const form = document.getElementById('form');

        form.addEventListener('submit', e => {

            e.preventDefault();

            const url = `http://localhost/ci_crud/`

            const title = document.querySelector('#title').value.trim()
            const body = document.querySelector('#body').value.trim()
           

            
        //     try {
        //         const res = await  fetch(`${url}post/store`,{
        //             method: "POST",
        //             body: JSON.stringify({title, body}),
        //             headers: {"Content-Type": "application/json"},
        //         })

        //         const data = await res.json();

        //         console.log(data);
              
                
        //     } catch (error) {
        //         console.log(err);
        //     }


            
            $.ajax({
                type: "POST",
                url: `${url}post/store`,
                data: data,
                dataType: "json",
                success: function (response) {
                    
                    let { success, message } = response;

                    success ? location.replace(`${url}`) : toastr.error(`${message}`); 
                }
            })
        })
    </script>
