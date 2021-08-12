
<div class="flex justify-center">


    <div class="w-6/12 p-6 mt-5 bg-white rounded-lg">


        <form id = "register_form">

            <div class="mb-4">
                <label for="email" class = "sr-only">Email</label>
                <input type="text" name = "email" id = "email" class = "bg-gray-200 p-4 rounded-lg w-full" placeholder="Email">
            </div>
            <div class="mb-4">
                <label for="username" class = "sr-only">Username</label>
                <input type="text" name = "username" id = "username" class = "bg-gray-200 p-4 rounded-lg w-full" placeholder="Username">
            </div>
            <div class="mb-4">
                <label for="password" class = "sr-only">Password</label>
                <input type="password" name = "password" id = "password" class = "bg-gray-200 p-4 rounded-lg w-full" placeholder="Password">
            </div>
            <div class="mb-4">
                <label for="Confirm Password" class = "sr-only">Email</label>
                <input type="password" name = "confirm_password" id = "confirm_password" class = "bg-gray-200 p-4 rounded-lg w-full" placeholder="Confirm Password">
            </div>
            <div class="mb-4">

                <button type="submit" class="py-3 px-4 text-white w-full text-white bg-blue-500 rounded-lg">Submit</button>
                <!-- <button class = "py-3 px-4 text-white w-full text-white bg-blue-500 rounded-lg">Register</button> -->
            </div>

        </form>
    </div>
</div>


<script>

    const form = document.getElementById('register_form');

    form.addEventListener('submit', async e => {

        e.preventDefault();

       const email = document.querySelector('#email').value.trim();
       const username = document.querySelector('#username').value.trim();
       const password = document.querySelector('#password').value.trim();
       const confirm_password = document.querySelector('#confirm_password').value.trim();


       const users = {
           email,username, password, confirm_password
       };

       await post_users(users);

    })

    const post_users = async (users) =>{
 
        const url = '<?php echo base_url()?>register/store';
        
        await $.ajax({
            type: "POST",
            url: url,
            data: users,
            dataType: "json",
            success: function (response) {
               
                let {status, message } = response;

                if(!status){
                    toastr.error(message);
                    return false;
                }

                toastr.success(message);
                setInterval(() => {
                    location.replace('http://localhost/ci_crud/login/index');
                }, 1500); 
            }
        });
       


    }
</script>
