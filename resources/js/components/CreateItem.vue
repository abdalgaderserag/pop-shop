<template>
    <div class="flex-box" style="margin: 0 20%">
        <div class="main-section" style="width: 100%">
            <!--<div>Create Item:</div>-->
            <!--<form v-if="!isCalled" action="#" method="get" @submit="save">-->
            <div v-if="!isCalled">
                <div>item title<span class="red">*</span></div>
                <input class="input-text" type="text" placeholder="the name of your item and type" v-model="title"
                       required>

                <br><br>
                <div>budget<span class="red">*</span></div>
                <input class="input-text small-input" style="width: 50%" placeholder="cost in dollars"
                       v-model="cost" type="number"
                       required>
                <span>.</span>
                <input class="input-text small-input" placeholder="cents" v-model="cents" style="margin: 0;"
                       type="number">

                <br><br>
                <div>details<span class="red">*</span></div>
                <textarea style="min-width: 90%;max-width: 90%;min-height: 124px" class="input-text"
                          v-model="details"
                          placeholder="tell the users about you item the perform and other stuff about the item."
                          required>
                </textarea>

                <br><br>
                <div>amount</div>
                <span @click="checkit(2)" style="cursor: pointer">unlimited</span>
                <div class="check">
                    <div v-show="checks[2].status" class="checked" @click="checkit(2)"></div>
                </div>

                <br>
                <input placeholder="the amount of the item in stock" v-show="!checks[2].status" v-model="stock"
                       class="input-text" type="text">

                <br><br>
                <div>category<span class="red">*</span></div>
                <!--<input class="input-text small-input" type="text" required>-->
                <select v-model="base" class="input-text" style="width: 38%">
                    <option v-for="cat in category">{{ cat }}</option>
                </select>
                <span>/</span>
                <input class="input-text small-input" style="margin: 0;width: 35%;" type="text" required>

                <br><br>
                <div>Location<span class="red">*</span></div>
                <input class="input-text" v-model="location" placeholder="where the item will delivered" type="text"
                       required>

                <br><br>
                <span @click="checkit(1)" style="cursor: pointer;">Exchangeable</span>
                <div @click="checkit(1)" class="check">
                    <div v-show="checks[1].status" class="checked"></div>
                </div>

                <br><br>
                <span @click="checkit(0)" style="cursor: pointer;">Used</span>
                <div @click="checkit(0)" class="check">
                    <div v-show="checks[0].status" class="checked"></div>
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
                <button class="input-button" style="width: 100%" @click="save">SAVE</button>
            </div>
            <!--</form>-->
            <div v-else>
                <div class="item-card flex-box">
                    <div class="item-left">
                        <img :src="item.images[0]" class="item-image main-image">
                        <div>
                            {{ item.created_at }}
                        </div>
                    </div>

                    <div class="item-body">
                        <div class="flex-box item-text">
                            <div style="width: 100%;">
                                <div class="flex-box item-title">
                                    <div>{{ item.title }}</div>
                                    <!--<div class="flex-box"
                                         style="width: 24px;flex-direction: row-reverse"
                                         v-html="'<div style=\'width: 24px\'>'+hart+'</div><div class=\'box-shadowed\'>2M</div>'">
                                    </div>-->
                                </div>
                                <span> - {{ '$' + item.budget }}</span>
                            </div>
                        </div>
                        <div class="item-text">
                            <div style="font-size: 2.4vh">{{ item.details }}</div>
                        </div>
                        <div class="item-text"><span>Location :</span>
                            <span>{{ item.category.location }}</span></div>
                        <div class="item-text"><span>Category :</span>
                            <span> {{item.category.base_type}} / {{ item.category.seconder_type }}</span></div>

                        <div v-if="item.stock != 'unlimited'" class="item-text">
                            only <span>{{ item.stock }}</span> in stock
                        </div>


                        <br>
                        <div v-if="item.stock == 'unlimited'" class="item-tag">
                            Unlimited
                        </div>
                        <div v-if="item.category.exchangeable" class="item-tag">
                            Exchangelable
                        </div>
                        <div v-if="item.category.used" class="item-tag">
                            Used
                        </div>
                    </div>
                </div>
                <a href="/">
                    <button class="input-button" style="width: 100%;background-color: gray">return to home</button>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CreateItem",
        data() {
            return {
                category: [],

                // inputs
                title: '',
                cost: '',
                cents: '',
                details: '',
                stock: '',
                location: '',
                base: '',
                second: '',
                checks: [
                    {
                        name: 'Exchangeable',
                        status: false,
                    },
                    {
                        name: 'Used',
                        status: false,
                    },
                    {
                        name: 'Unlimited',
                        status: false,
                    },
                ],
                images: [
                    {
                        url: '',
                    },
                ],

                // callback item
                isCalled: false,
                item: {},
            }
        },
        mounted() {
            this.getCategory();
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
            },
            checkit: function (index) {
                this.checks[index].status = !this.checks[index].status;
            },
            save: function (e) {
                let images = [];
                for (let i = 0; i < this.images.length - 1; i++) {
                    images[i] = this.images[i].url;
                }

                let data = {
                    title: this.title,
                    details: this.details,
                    budget: this.cost,
                    cents: this.cents,
                    images: images,
                    stock: this.stock,
                    base_type: this.base,
                    seconder_type: this.second,
                    location: this.location,
                    exchangeable: this.checks[0].status,
                    used: this.checks[1].status,
                    unlimited: this.checks[2].status,
                };

                if (data.images.length >= 4) {
                    axios.post('/api/item', data)
                        .then((response) => {
                            this.item = response.data;
                            this.title = '';
                            this.cost = '';
                            this.cents = '';
                            this.details = '';
                            this.stock = '';
                            this.location = '';
                            this.base = '';
                            this.second = '';
                            for (let i = 0; i < this.checks.length; i++)
                                this.checks[i].status = false;

                            this.images = [];

                            this.images.push({
                                url: '',
                            });
                            this.isCalled = true;
                        });
                    // TODO : add the function after the validation failed
                }
            },
            getCategory: function () {
                axios.get('/test/category.json').then(response => {
                    this.category = response.data.category;
                })
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
        border-radius: 0;
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
    }

    .red {
        color: #ff3008;
        font-weight: 900;
    }
</style>