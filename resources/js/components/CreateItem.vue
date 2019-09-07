<template>
    <div class="flex-box" style="margin: 0 20%">
        <div class="main-section" style="width: 100%">
            <!--<div>Create Item:</div>-->
            <div>
                <div>item title*</div>
                <input class="input-text" type="text" required>

                <div>budget*</div>
                <input class="input-text small-input" type="text" required>
                <span>.</span>
                <input class="input-text small-input" style="margin: 0;" type="text">

                <div>details*</div>
                <textarea style="min-width: 95%;max-width: 100%;min-height: 124px" class="input-text"
                          required>
                </textarea>

                <div>amount</div>
                <span>unlimited</span>
                <div class="check">
                    <div class="checked"></div>
                </div>

                <br>
                <input class="input-text" type="text">

                <div>category*</div>
                <input class="input-text small-input" type="text" required>
                /
                <input class="input-text small-input" style="margin: 0;" type="text" required>

                <div>Location*</div>
                <input class="input-text small-input" type="text" required>

                <br>
                <span>Exchangeable</span>
                <div class="check">
                    <div class="checked"></div>
                </div>

                <br>
                <span>Used</span>
                <div class="check">
                    <div class="checked"></div>
                </div>

                <div class="input-text"
                     style="height: 120px;width: 120px;background: #fff;cursor: pointer;border-style: dashed;border-width: 6px;"
                     @click="uploadImage">
                </div>

                <input type="file" style="display: none" id="upload">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CreateItem",
        methods: {
            uploadImage: function (event) {
                let uploder = document.getElementById('upload');
                uploder.click();
                uploder.onchange = (e) => {
                    let reader = new FileReader();
                    reader.readAsDataURL(e.target.files[0]);
                    reader.onload = () => {
                        axios.post('/api/upload', {
                            result: reader.result,
                        }).then((response) => {
                            console.log(response);
                        });
                    };
                }
            }
        }
    }
</script>

<style scoped>
    .small-input {
        width: 20%;
    }

    .input-text {
        margin-left: 5%;
    }
</style>