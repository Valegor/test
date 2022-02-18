import Vue from 'vue'
import Router from 'vue-router'

//Main
import Home from '@/components/Home'

// Authorization
import Login from '@/components/Auth/Login'
import Registration from '@/components/Auth/Registration'

//Blog
import Post from '@/components/Blog/Post'
import Posts from '@/components/Blog/Posts'
import PostsCategories from '@/components/Blog/PostsCategories'
import PostsCategory from '@/components/Blog/PostsCategory'

//Game
import Card from '@/components/Game/Card'
import CardCode from '@/components/Game/CardCode'
import Cards from '@/components/Game/Cards'
import CardsCategory from '@/components/Game/CardsCategory'
import CardsCategories from '@/components/Game/CardsCategories'
import Game from '@/components/Game/Game'
import Games from '@/components/Game/Games'
import GameCategory from '@/components/Game/GameCategory'
import GameCategories from '@/components/Game/GameCategories'
import Records from '@/components/Game/Records'

import Start from '@/components/Game/Play/Start'
import Quest from '@/components/Game/Play/Quest'
import Finish from '@/components/Game/Play/Finish'

//Static
import About from '@/components/Static/About'
import Author from '@/components/Static/Author'
import Feedback from '@/components/Static/Feedback'
import Projects from '@/components/Static/Projects'
import Rules from '@/components/Static/Rules'

//Answer-Index
import Answer from '@/components/Answers/Answer'
import AnswerCards from '@/components/Answers/AnswerCards'
import ShowAnswerCards from '@/components/Answers/ShowAnswerCards'
import TemplateAnswers from '@/components/Answers/TemplateAnswers'
import Template from '@/components/Answers/Template'
import TemplateCategories from '@/components/Answers/TemplateCategories'
import TemplateCategory from '@/components/Answers/TemplateCategory'

//Answer-Comments
import CommentCreate from '@/components/Answers/Comments/CommentCreate'
import CommentUpdate from '@/components/Answers/Comments/CommentUpdate'
import MyComments from '@/components/Answers/Comments/MyComments'

//Answer-Create
import AnswerCreate from '@/components/Answers/Create/AnswerCreate'
import AnswerUpdate from '@/components/Answers/Create/AnswerUpdate'
import AnswerUpdatePassport from '@/components/Answers/Create/AnswerUpdatePassport'
import AnswerUpdateObject from '@/components/Answers/Create/AnswerUpdateObject'
import StartCreate from '@/components/Answers/Create/StartCreate'
import MyAnswers from '@/components/Answers/Create/MyAnswers'


//Test
import Test from '@/components/Test'
import Get from '@/components/Get'


Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '',
      name: 'home',
      component: Home
    },
    {
      path: '/login',
      name: 'login',
      component: Login
    },
    {
      path: '/registration',
      name: 'reg',
      component: Registration
    },
    {
      path: '/test',
      name: 'test',
      component: Test,
      meta:{
        layout: "game-layout"
      }
    },
    {
      path: '/get',
      name: 'get',
      component: Get
    },
    {
      path: '/post/:id',
      name: 'post',
      component: Post
    },
    {
      path: '/posts',
      name: 'posts',
      component: Posts
    },
    {
      path: '/posts-categories',
      name: 'post.categories',
      component: PostsCategories
    },
    {
      path: '/posts-category/:id',
      name: 'post.category',
      component: PostsCategory
    },
    {
      path: '/card/:id',
      name: 'card',
      component: Card
    },
    {
      path: '/card-code/:code',
      name: 'card-code',
      component: CardCode
    },
    {
      path: '/cards',
      name: 'cards',
      component: Cards
    },
    {
      path: '/cards-category/:id',
      name: 'cards.category',
      component: CardsCategory
    },
    {
      path: '/cards-categories',
      name: 'cards.categories',
      component: CardsCategories
    },
    {
      path: '/games-categories',
      name: 'games.categories',
      component: GameCategories
    },    
    {
      path: '/games-category/:id',
      name: 'games.category',
      component: GameCategory
    },
    {
      path: '/game/:id',
      name: 'game',
      component: Game
    },
    {
      path: '/games',
      name: 'games',
      component: Games
    },
    {
      path: '/records',
      name: 'records',
      component: Records
    },
    {
      path: '/about',
      name: 'about',
      component: About
    },
    {
      path: '/author',
      name: 'author',
      component: Author
    },
    {
      path: '/feedback',
      name: 'feedback',
      component: Feedback
    },
    {
      path: '/rules',
      name: 'rules',
      component: Rules
    },
    {
      path: '/projects',
      name: 'projects',
      component: Projects
    },
    {
      path: '/start',
      name: 'start',
      component: Start
    },
    {
      path: '/quest',
      name: 'quest',
      component: Quest
    },
    {
      path: '/finish',
      name: 'finish',
      component: Finish
    },
    {
      path: '/answer/:id',
      name: 'answer',
      component: Answer
    },
    {
      path: '/answer-cards/:id',
      name: 'answer-cards',
      component: AnswerCards
    },
    {
      path: '/show-answer-cards/:id',
      name: 'show-answer-cards',
      component: ShowAnswerCards
    },
    {
      path: '/template-answers/:id',
      name: 'template-answers',
      component: TemplateAnswers
    },
    {
      path: '/template/:id',
      name: 'template',
      component: Template
    },
    {
      path: '/template-categories',
      name: 'template-categories',
      component: TemplateCategories
    },
    {
      path: '/template-category/:id',
      name: 'template-category',
      component: TemplateCategory
    },
    {
      path: '/comment-create/:id',
      name: 'comment-create',
      component: CommentCreate
    },
    {
      path: '/comment-update/:id',
      name: 'comment-update',
      component: CommentUpdate
    },
    {
      path: '/mycomments/:id',
      name: 'mycomments-my',
      component: MyComments
    },
    {
      path: '/answer-create/:id',
      name: 'answer-create',
      component: AnswerCreate
    },
    {
      path: '/answer-update/:id',
      name: 'answer-update',
      component: AnswerUpdate
    },
    {
      path: '/answer-update-passport/:id',
      name: 'answer-update-passport',
      component: AnswerUpdatePassport
    },
    {
      path: '/answer-update-object/:id',
      name: 'answer-update-object',
      component: AnswerUpdateObject
    },
    {
      path: '/start-answer',
      name: 'start-answer',
      component: StartCreate
    },
    {
      path: '/myanswers',
      name: 'myanswers',
      component: MyAnswers
    },
  ],
  mode: 'history'
})