<template>
    <div class="flex-box" style="margin: 0 20%">
        <div class="main-section" style="width: 100%">
            <!--<div>Create Item:</div>-->
            <form action="#" method="get">
                <div>
                    <div>item title<span class="red">*</span></div>
                    <input class="input-text" type="text" placeholder="the name of your item and type" v-model="title"
                           required>

                    <br><br>
                    <div>budget<span class="red">*</span></div>
                    <input class="input-text small-input" placeholder="cost in dollars" v-model="cost" type="number"
                           required>
                    <span>.</span>
                    <input class="input-text small-input" placeholder="cents" v-model="cents" style="margin: 0;"
                           type="number">

                    <br><br>
                    <div>details<span class="red">*</span></div>
                    <textarea style="min-width: 90%;max-width: 90%;min-height: 124px" class="input-text"
                              v-model="details"
                              placeholder="tell the users about you item the peform and other stuff about the item."
                              required>
                </textarea>

                    <br><br>
                    <div>amount</div>
                    <span>unlimited</span>
                    <div class="check">
                        <div class="checked"></div>
                    </div>

                    <br>
                    <input placeholder="the amount of the item in stock" v-model="stock" class="input-text" type="text">

                    <br><br>
                    <div>category<span class="red">*</span></div>
                    <input class="input-text small-input" type="text" required>
                    <span>/</span>
                    <input class="input-text small-input" style="margin: 0;" type="text" required>

                    <br><br>
                    <div>Location<span class="red">*</span></div>
                    <input class="input-text" v-model="location" placeholder="where the item will delivered" type="text"
                           required>

                    <br><br>
                    <span>Exchangeable</span>
                    <div class="check">
                        <div class="checked"></div>
                    </div>

                    <br><br>
                    <span>Used</span>
                    <div class="check">
                        <div class="checked"></div>
                    </div>

                    <br><br>
                    <div>Images<span class="red">*</span></div>
                    <br><br>
                    <div class="flex-box" style="flex-wrap: wrap;justify-content: center">
                        <div v-for="(image,index) in images" v-if="index < 6" class="input-text image-h-upload"
                             @click="uploadImage">
                            <input type="file" class="file-input">
                            <img :name="index" class="add-image" :src="image.url" alt="">
                        </div>
                    </div>

                    <br>
                    <button class="input-button" style="width: 100%">SAVE</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CreateItem",
        data() {
            return {
                images: [
                    {
                        url: '',
                    },
                ],

                //    inputs
                title: '',
                cost: '',
                cents: '',
                details: '',
                stock: '',
                location: '',
            }
        },
        methods: {
            uploadImage: function (event) {
                let uploder = event.target.children[0];


                if (event.target.className == 'file-input')
                    return;

                if (event.target.className == 'add-image') {
                    this.images.splice(Number.parseInt(event.target.name), 1);
                    return;
                }

                if (this.images.length > 6)
                    return;

                uploder.click();
                uploder.onchange = (e) => {
                    let reader = new FileReader();
                    reader.readAsDataURL(e.target.files[0]);

                    let ele = event.target;
                    reader.onloadstart = () => {
                        while (!ele.className.includes('image-h-upload')) {
                            ele = ele.parentElement;
                        }
                        /**
                         * you can add the load holder here!!
                         *
                         * */
                        ele.style.animationName = 'holder';
                    };

                    reader.onloadend = () => {
                        ele.style.animationName = '';
                    };
                    reader.onload = () => {
                        axios.post('/api/upload', {
                            result: reader.result,
                        }).then((response) => {
                            this.images[this.images.length - 1].url = response.data.path;

                            this.images.push({
                                url: '',
                            });

                            e.target.parentElement.className += " image-loaded";
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

    .image-h-upload {
        height: 120px;
        width: 120px;
        background: #fff;
        cursor: pointer;
        border-style: dashed;
        border-width: 6px;
        margin-bottom: 24px;
        animation-duration: 1500ms;
        animation-iteration-count: infinite;
    }

    .file-input {
        display: none;
    }

    .add-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .image-loaded {
        padding: 0;
        width: 128px;
        height: 128px;
        border-radius: 0;
    }

    .red {
        color: #ff3008;
        font-weight: 900;
    }
</style>