<template>
    <div class="left-section">
        <div class="flex-box mark-title">
            <div></div>
            <div>Filters.</div>
        </div>

        <div class="filters">


            <div v-for="(check,index) in checks" class="filter">
                <div class="check" @click="checkit(index)">
                    <div v-show="check.status" class="checked"></div>
                </div>
                <div class="filter-text" @click="checkit(index)" style="cursor: pointer">
                    {{ check.name }}
                </div>
            </div>


            <div class="filter">
                <input @input="getUrl" type="text" v-model="locations" placeholder="Location" id="location"
                       class="input-text">
            </div>

            <div class="filter">
                <div>Cost :</div>
                <input @input="getUrl" type="text" v-model="min" placeholder="min" id="min"
                       style="width: 28.25%;float: left"
                       class="input-text">
                <span style="margin: 0 0 0 3px">to</span>
                <input @input="getUrl" type="text" v-model="max" placeholder="max" id="max" style="width: 28.25%"
                       class="input-text">
            </div>

            <div v-if="!checks[2].status" class="filter">
                <input @input="getUrl" type="text" v-model="stock" placeholder="In Stock" id="amount"
                       class="input-text">
            </div>

            <div class="filter">
                <input type="submit" @click="resetInput()" value="Reset" class="input-text input-button">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Filters",
        data() {
            return {
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
                locations: '',
                min: '',
                max: '',
                stock: '',

                url: '',
            }
        },
        mounted() {
            this.parseUrl();
        },
        methods: {
            resetInput: function () {
                this.locations = '';
                this.min = '';
                this.max = '';
                this.stock = '';
                for (let i = 0; i < this.checks.length; i++)
                    this.checks[i].status = false;
            },
            checkit: function (index) {
                this.checks[index].status = !this.checks[index].status;
                this.getUrl();
            },
            parseUrl: function () {
                // let url = window.location.hash;
                // let filtersArray = url.split('=');
                // let finalArray = [];
                // filtersArray[0] = filtersArray[0].slice(1, filtersArray[0].length);
                // if (filtersArray[0][1] == '?')
                //     filtersArray[0] = filtersArray[0].slice(1, filtersArray[0].length);
                //
                // finalArray[0] = filtersArray[0];
                //
                // let holder;
                // for (let i = 1; i < filtersArray.length; i++) {
                //     holder = filtersArray[i].split('&');
                //     finalArray[finalArray.length] = holder[0];
                //     finalArray[finalArray.length] = holder[1];
                // }
                //
                // finalArray.pop();
                // console.log(finalArray);
                let hash = window.location.hash;
                let filters = hash.split('=');
                if (filters.length != 1) {
                    filters[0] = filters[0].slice(2, filters[0].length);
                    let counts = filters.length;
                    if (filters[0] == 'location')
                        this.locations = filters[1].split('&')[0];
                    console.log(filters);
                    for (let i = 1; i < counts; i++) {
                        let hood = filters[i].split('&')[1];
                        if (hood == 'min')
                            this.min = filters[i + 1].split('&')[0];
                        else if (hood == 'max')
                            this.max = filters[i + 1].split('&')[0];
                        else if (hood == 'amount')
                            this.stock = filters[i + 1].split('&')[0];
                        else if (hood == 'Unlimited')
                            this.checks[2].status = true;
                        else if (hood == 'Exchangeable')
                            this.checks[0].status = true;
                        else if (hood == 'Used')
                            this.checks[1].status = true;
                    }
                }
                /* for (let i = 0; i < finalArray.length; i + 2) {
                if (finalArray[i] == 'location')
                    this.locations = finalArray[i + 1];
                else if (finalArray[i] == 'min')
                    this.min = finalArray[i + 1];
                else if (finalArray[i] == 'max')
                    this.max = finalArray[i + 1];
                else if (finalArray[i] == 'amount')
                    this.stock = finalArray[i + 1];
                else if (finalArray[i] == 'Exchangeable')
                    this.checks[0].status = true;
                else if (finalArray[i] == 'Used')
                    this.checks[1].status = true;
                else if (finalArray[i] == 'Unlimited')
                    this.checks[2].status = true;
            }*/
            },
            getUrl: function () {
                let url = '?';
                if (this.locations != '')
                    url = url + 'location=' + this.locations + '&';
                if (this.min != '')
                    url = url + 'min=' + this.min + '&';
                if (this.max != '')
                    url = url + 'max=' + this.max + '&';
                if (this.stock != '')
                    url = url + 'amount=' + this.stock + '&';

                for (let i = 0; i < this.checks.length; i++)
                    if (this.checks[i].status)
                        url = url + this.checks[i].name + '=true&';

                url = '#' + url.slice(0, url.length - 1);
                this.url = url == '?' ? '' : +url;
                window.location.href = window.location.origin + url;
            },
        }
    }
</script>

<style scoped>

</style>