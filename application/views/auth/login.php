
<div class="flex justify-center">

    <div class="bg-white rounded-lg w-6/12 p-4">

    <form id = "login_form">

        <div class="mb-4">
            <label for="username" class = "sr-only">Email</label>
            <input type="text" name = "username" id = "username" class = "bg-gray-200 p-4 w-full rounded-lg" placeholder="Username">
        </div>
        <div class="mb-4">
            <label for="password" class = "sr-only">Password</label>
            <input type="password" name = "password" id = "password" class = "bg-gray-200 p-4 w-full rounded-lg" placeholder="Password">
        </div>
        <div class="mb-4">
            <button class = "bg-blue-500 py-3 px-4 text-white w-full rounded-lg">Login</button>
        </div>

    </form>
    </div>
</div>

<script>

    const form = document.getElementById('login_form');



    form.addEventListener('submit', async e => {

        e.preventDefault();

        const username = document.querySelector('#username').value.trim()
        const password = document.querySelector('#password').value.trim()

        console.log(username, password);

        const user = {
            username, password
        }

        await login(user)

    })

    const login = async (user) => {

        const url = "<?php echo base_url()?>login/store"

        $.ajax({
            type: "POST",
            url: url,
            data: user,
            dataType: "json",
            success: function (response) {


              console.log(response);
              let {status, message }  = response;
             
             if(!status){
                toastr.error(message)
                return false;
             }
             location.reload();
            }
        });

    }



</script>
