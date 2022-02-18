export default {
    state: {
        game_id: '',
        total: 0,
        block: 0,
        blocks: 0,
        locus: 0,
        locuses: 0,
        card: 0,
        cards: 0,
        wright: 0,
        wrong: 0
    },
    mutations: {
        SET_GAME_ID: (state, payload) => {
            state.game_id = payload;
        },
        SET_TOTAL: (state, payload) => {
            state.total = payload;
        },
        SET_BLOCK: (state, payload) => {
            state.block = payload;
        },  
        SET_BLOCKS: (state, payload) => {
            state.blocks = payload;
        },  
        SET_LOCUS: (state, payload) => {
            state.locus = payload;
        },  
        SET_LOCUSES: (state, payload) => {
            state.locuses = payload;
        }, 
        SET_CARD: (state, payload) => {
            state.card = payload;
        },  
        SET_CARDS: (state, payload) => {
            state.cards = payload;
        },
        SET_WRIGHT: (state, payload) => {
            state.wright = payload;
        },  
        SET_WRONG: (state, payload) => {
            state.wrong = payload;
        },      
    },
    actions: {},
    getters: {
        GAME_ID (state) {
            return state.game_id
        },
        TOTAL (state) {
            return state.total
        }, 
        BLOCK (state) {
            return state.block
        }, 
        BLOCKS (state) {
            return state.blocks
        }, 
        LOCUS (state) {
            return state.locus
        }, 
        LOCUSES (state) {
            return state.locuses
        }, 
        CARD (state) {
            return state.card
        }, 
        CARDS (state) {
            return state.cards
        }, 
        WRIGHT (state) {
            return state.wright
        },
        WRONG (state) {
            return state.wrong
        },
    }
}
