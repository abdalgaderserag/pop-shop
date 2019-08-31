<template>
    <div class="flex-box" style="justify-content: center">
        <filters></filters>

        <div class="main-section">

            <!-- header of the list -->
            <div class="card-header">
                Items
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

            <div v-if="isLoaded" v-for="item in items" class="item-card flex-box">
                <div class="item-left">
                    <img src="/test/mapbox.jpg" class="item-image">
                    <div>
                        {{ parseTime(item.created_at) }}
                        <!--{{ item.created_at }}-->
                    </div>
                </div>
                <div class="item-body">
                    <div class="flex-box item-text">
                        <div>
                            <div style="font-size: 3.5vh">{{ item.title }}</div>
                            <span> - {{ '$' + item.budget }}</span>
                        </div>
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

        <categories></categories>

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
            }
        },
        mounted() {
            this.getItems();
        },
        methods: {
            getItems: function () {
                axios.get('/api/item').then((response) => {
                    this.items = response.data.items;
                    this.isLoaded = true;
                });
            },
            parseTime: function (time) {
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
            }
        }
    }
</script>