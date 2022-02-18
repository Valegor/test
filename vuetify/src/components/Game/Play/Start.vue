<template>
<div>
<v-card
    class="mx-auto"
    max-width="344"
  >
        <v-card-title>
        BLOCK {{ block_tek }} FROM {{ blocks_count }}: <br>
        {{ block_tek_title }}
        </v-card-title>
        <hr>
        <v-card-subtitle>
        <b>Block subtitle:</b> {{ locus_tek_subtitle }} <br>     
        </v-card-subtitle>
    <hr>
        <v-card-title>
        QUESTION: {{ locus_tek_title }}
        </v-card-title>
    <hr>
        <v-card-subtitle>
        QESTION {{ locus_tek }} FROM {{ locuses_count }}: <br>
        {{ locus_tek_title }}    
        </v-card-subtitle>
 </v-card>

      <v-row>
         <v-col
          cols="12"
          sm="6"
          md="4"
        >
          <v-subheader>Answers</v-subheader>
            <v-radio-group v-model="ans" class="radio-container d-flex">
                <v-radio
                    class="radio-item"
                    color="primary"
                    v-for="card of cards"
                    :key="(cards.indexOf(card) + 1)"
                    :value="(cards.indexOf(card) + 1)"
                    :label="card.name"
                ></v-radio>
            </v-radio-group>
        </v-col>
      </v-row>

    <hr>
   
 <v-row justify="center">
    <v-btn
      color="primary"
      dark
      @click="answer"
    >
      Open Dialog
    </v-btn>

<v-dialog
      v-model="dialog"
      max-width="290"
    >
      <v-card>
        <v-card-title class="text-h5">
          {{ estimation_answer }}: {{ game_score }}
        </v-card-title>

        <v-card-text>
          {{ estimation_subtitle }}
        </v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>

          <v-btn
            color="green darken-1"
            text
            @click="dialog = false"
          >
            OK
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
 
  </div>

</template>

<script>

    // import * as lib from '@/library/gameFunctions'

    export default {
    data: () => ({       
        game: {},
        dialog: false,
        ans: 1,
        block_tek: 1,
        blocks_count: 1,
        locus_tek: 1,
        locuses_count: 1,
        card_answer: [],
        cards_tek_locus: [],
        user_score: 0,
        game_score: 0,
        block_tek_title: '',
        block_tek_subtitle: '',
        locus_tek_title: '',
        locus_tek_subtitle: '',
        finish: false,
        card_count: 0,
        answer_number: 1,
        estimation_answer: '',
        estimation_subtitle: '',
        estimation_game: '',
        cards: [],
        wright: 0,
        wrong: 0,
    }),
    methods: {
        start(){
            this.game = this.$store.getters.OBJECT
            this.block_tek = 1
            this.blocks_count = this.blockCount()
            this.locus_tek = 1
            this.locuses_count = this.countLocus()
            this.cards_tek_locus = this.getLocusCards()
            this.user_score = this.getUserScore()
            this.game_score = 0
            this.block_tek_title = this.tekBlockName()
            this.block_tek_subtitle = this.tekBlockSubtitle()
            this.locus_tek_title = this.tekLocusTitle()
            this.locus_tek_subtitle  = this.tekLocusSubTitle()
            this.finish = false
            this.cards = this.getCards()
            this.wright = 0
            this.wrong = 0
            // console.log(this.locus_tek_subtitle)
            this.stepInfo()
        },
        engGame(){

            this.$store.commit('SET_WRIGHT', this.wright)
            this.$store.commit('SET_WRONG', this.wrong)
            this.$store.commit('SET_TOTAL', this.game_score)

            this.$router.push({name:'finish'}); 
        },
        answer(){

            if(this.finish == true){
                console.log('stop answer')
                return 0
            }

            console.log('Ans: ' + this.ans)

            if (this.ans > Object.keys(this.game.blocks[this.block_tek - 1].locuses[this.locus_tek - 1].cards).length) {
                console.log('incorrect answer number')
                this.step()
                return 0
            }

            this.game_score = this.game_score + this.cards[this.ans - 1].point
            console.log('Game score: ' + this.game_score)

            if(this.game_score > 0){
                this.estimation_answer = 'Правильно'
                this.wright++
            } else {
                this.estimation_answer = 'Вы ошиблись'
                this.wrong++
            }

            this.estimation_subtitle = this.cards[this.ans - 1].takenotes

            console.log('Estimation subtitle: ' + this.estimation_subtitle)

            // this.card_count = Object.keys(this.cards).length
            // console.log('Card count: ' + this.card_count)
            this.dialog = true

            this.ans = 1

            this.step()
        },
        step(){

            if(this.locus_tek < this.locuses_count){
                this.locus_tek++
                this.stepInfo()
                return 1
            }

            if((this.locus_tek == this.locuses_count) && (this.block_tek < this.blocks_count)){
                this.block_tek ++
                this.locus_tek = 1
                this.locuses_count = this.countLocus()
                this.stepInfo()
                return 1          
            }

            if((this.locus_tek == this.locuses_count) && (this.block_tek == this.blocks_count)){
                this.finish = true
                console.log('finish')
                this.engGame()
                return 1         
            }

        },
        stepInfo(){
            console.log('block: ' + this.block_tek + ' from ' + this.blocks_count)
            console.log('locus: ' + this.locus_tek  + ' from ' + this.locuses_count)

            this.block_tek_title = this.tekBlockName()
            this.block_tek_subtitle = this.tekBlockSubtitle()
            this.locus_tek_title = this.tekLocusTitle()
            this.locus_tek_subtitle  = this.tekLocusSubTitle()
            this.cards_tek_locus = this.getLocusCards()
            this.cards = this.getCards()

            // console.log(this.block_tek_title)
            // console.log(this.block_tek_subtitle)
            // console.log(this.locus_tek_title)
            // console.log(this.locus_tek_subtitle)
            // console.log(this.cards_tek_locus)
            // console.log(this.cards)
        },
        getCards(){
            let result = []
            let cardCount = Object.keys(this.game.blocks[this.block_tek - 1].locuses[this.locus_tek - 1].cards).length
                for (let i = 1; i <=  cardCount; i++) {  
                result.push(this.game.blocks[this.block_tek - 1].locuses[this.locus_tek - 1].cards[i - 1])
            }
        return result
        },
        blockCount(){
            return Object.keys(this.game.blocks).length
        },
        countLocus() {
            return Object.keys(this.game.blocks[this.block_tek - 1].locuses).length
        },
        getLocusCards(){
            return this.game.blocks[this.block_tek - 1].locuses[this.locus_tek - 1].cards
        },
        getUserScore(){
            return this.$store.getters.USER_SCORE
        },
        totalScore(){
                let total = 0
                let blockCount = this.blockCount() 
                    for (let i = 1; i <=  blockCount; i++) { // выведет 0, затем 1, затем 2
                        let locusCount = Object.keys(this.game.blocks[i - 1].locuses).length
                            for (let j = 1; j <=  locusCount; j++) { // выведет 0, затем 1, затем 2
                                total += this.game.blocks[i-1].locuses[j-1].locus_points
                }  
            }
            return total
        },
        tekBlockName() {
            return this.game.blocks[this.block_tek  - 1].name
        },
        tekBlockSubtitle() {
            return this.game.blocks[this.block_tek - 1].notes
        },
        tekLocusTitle(){
            return this.game.blocks[this.block_tek - 1].locuses[this.locus_tek - 1].locus_name
        },
        tekLocusSubTitle(){
            return this.game.blocks[this.block_tek - 1].locuses[this.locus_tek - 1].locus_notes
        }
    },
    created () {

    }, 
    updated (){

    },
    mounted() {
        this.start()
    }

    }

        // this.game
        // this.block_tek
        // this.blocks_count
        // this.locus_tek
        // this.locuses_count
        // this.card_answer
        // this.cards_tek
        // this.user_score
        // this.game_score
        // this.block_tek_title
        // this.block_tek_subtitle
        // this.locus_tek_title
        // this.locus_tek_subtitle
        // this.finish

</script>


