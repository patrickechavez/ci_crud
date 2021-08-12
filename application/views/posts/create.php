
    <div class="flex justify-center">

        <div class="w-4/12 bg-white p-6 rounded-lg">

            <form action="<?php echo base_url() ?>posts/store" method="POST">

                <div class="mb-4">
                    <label for="title" class = "sr-only">Title</label>
                    <input type="text" name = "title" class = "w-full border-2 p-4 rounded-lg bg-gray-200" placeholder="title">
                </div>

                <div class="mb-4">
                    <textarea name="body" class = "w-full border-2 p-4 rounded-lg bg-gray-200" placeholder="Body"></textarea>
                </div>

                <div class="mb-4">
                    <button class = "bg-blue-500 w-full py-3 px-4 text-white rounded-lg">SAVE</button>
                </div>
            </form>
        </div>
    </div>
