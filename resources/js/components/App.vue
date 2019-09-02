<template>
    <div class="flex-box" style="justify-content: center">

        <filters v-show="singleItemMode"></filters>

        <div class="main-section">

            <!-- header of the list -->
            <div class="card-header flex-box">
                <div v-show="!singleItemMode" style="margin-right:20px;cursor:pointer;"
                     @click="normalMode"><
                </div>
                <div>Items</div>
            </div>

            <!-- the items holders -->
            <div v-if="!isLoaded" v-for="holder in holdersNumber" class="item-card flex-box">
                <!-- card Image -->
                <div class="item-image" style="background-color: #f5f5f5"></div>

                <!-- card Body -->
                <div class="item-body">
                    <div class="flex-box item-text">
                        <div class="holder" style="width: 50%">
                        </div>
                    </div>

                    <div class="item-text holder">
                    </div>

                    <div class="item-text holder">
                    </div>

                    <div class="item-text holder"></div>

                    <div class="item-text holder"></div>
                </div>
            </div>

            <div v-if="isLoaded" v-for="(item, index) in items" @click="displayItem(index)"
                 class="item-card flex-box">

                <div class="item-left">
                    <img :src="reConImage(activeImage)" class="item-image main-image">
                    <div v-if="!singleItemMode" class="flex-box" style="width: 100%;">
                        <div style="width: 8%;height: 64px" @click="activeImage++"><</div>
                        <img v-for="(image,index) in item.images" v-if="index + activeImage < 3 + activeImage"
                             style="width: 28%;height: 64px" :src="reConImage(index)" alt="">
                        <div style="width: 8%;height: 64px" @click="activeImage++">></div>
                    </div>
                    <div>
                        {{ parseTime(item.created_at) }}
                        <!--{{ item.created_at }}-->
                    </div>
                </div>

                <div class="item-body">
                    <div class="flex-box item-text">
                        <div style="width: 100%;">
                            <div class="flex-box" style="font-size: 3.5vh;justify-content: space-between">
                                <div>{{ item.title }}</div>
                                <div v-if="!singleItemMode" style="width: 24px" v-html="hart"></div>
                            </div>
                            <span> - {{ '$' + item.budget }}</span>
                        </div>
                    </div>
                    <div v-if="!singleItemMode" class="item-text">
                        <button class="input-button" style="width: 26%;border-width:0;margin-bottom: 16px;">Buy</button>
                    </div>
                    <div v-if="!singleItemMode" class="item-text">
                        <div style="font-size: 2.4vh">{{ item.details }}</div>
                    </div>
                    <div class="item-text"><span>Location :</span>
                        <span>{{ item.category.location }}</span></div>
                    <div class="item-text"><span>Category :</span>
                        <span> {{item.category.base_type}} / {{ item.category.seconder_type }}</span></div>

                    <div class="item-text"><span>By</span> <a :href="'/profile/' + item.user.id" class="link-clear">
                        {{item.user.name }}</a>
                    </div>

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


            <div class="card-footer"></div>
        </div>

        <categories v-show="singleItemMode"></categories>

    </div>
</template>

<script>
    export default {
        name: "App",
        data() {
            return {
                holdersNumber: 5,
                isLoaded: false,

                items: [],
                activeItem: 0,

                singleItemMode: true,
                screenLocation: 0,
                activeImage: 0,

                hart: '<3',
            }
        },
        mounted() {
            this.getItems();
            window.onkeydown = (e) => {
                if (e.key == 'Escape' && !this.singleItemMode) {
                    this.normalMode();
                }
            };
            axios.get('/site/hart.svg').then((response) => {
                this.hart = response.data;
                for (let i = 0; i < this.items.length; i++) {
                    this.items[i].hart = this.hart;
                }
            });
        },

        methods: {
            getItems: function () {
                axios.get('/api/item').then((response) => {
                    this.items = response.data.items;
                    this.isLoaded = true;
                });
            },
            parseTime: function (time) {
                return time.slice(0, time.length - 9);
                //TODO : fix this, it should return the right string
                let par = (new Date('' + time).getTime() / 1000) - (new Date().getTime() / 1000);
                if (par < 60)
                    return 'just now!';
                else if (par < 3600)
                    return Number.parseInt(par / 60);
                else if (par < (3600 / 24)) {
                    let hour = Number.parseInt((par / 3600) * 24);
                    if (hour == 1)
                        return 'hour ago';
                    else if (hour == 2)
                        return 'two hour ago';
                    else
                        return hour + ' hour ago';
                } else
                    return time.slice(0, time.length - 9);
            },
            displayItem: function (index = '') {
                if (this.singleItemMode) {
                    let item = this.items[index];
                    let main = document.getElementsByClassName('main-section')[0];
                    if (main.offsetWidth + 100 > window.window.innerWidth) {
                        window.location.href += 'item/' + item.id;
                        return;
                    }
                    main.style.width = '100%';
                    this.activeItem = index;
                    this.singleItemMode = false;
                    this.screenLocation = window.scrollY;
                    let element = document.getElementsByClassName('item-card')[index];
                    this.hideOtherItems(element);
                }
            },
            hideOtherItems: function (item) {
                let items = document.getElementsByClassName('item-card');
                for (let i = 0; i < items.length; i++) {
                    items[i].style.display = 'none';
                }
                item.style.display = '';
                let left = item.getElementsByClassName('item-left')[0];
                let body = item.getElementsByClassName('item-body')[0];
                left.style.width = '30%';
                body.style.width = '68%';
            },
            normalMode: function () {
                this.displayItem();
                this.activeImage = 0;
                document.getElementsByClassName('main-section')[0].style.width = '60%';
                this.singleItemMode = true;
                setTimeout(() => {
                    // this.singleItemMode = true;
                    let items = document.getElementsByClassName('item-card');
                    for (let i = 0; i < items.length; i++) {
                        items[i].style.display = '';
                    }
                    window.scrollTo(0, this.screenLocation);
                }, 500);
            },
            reConImage: function (index) {
                while (index > 3) {
                    index -= 3;
                }
                return this.items[this.activeItem].images[index];
            }
        }
    }
</script>