export default {
    state: {
      object: {
            title: {
                program_name: "Тестовая игра 1",
                notes: "Описание тестовой игры 1",
            },
            author: {
                name: "имя автора 1",
                email: "mail1@mail.ru"
            },
            tags: [
                "тэг 1", "тэг 5", "тэг 15"
            ],
            blocks:[
                {
                    name: "Блок 1",
                    notes: "Описание блока 1",
                    locuses: [
                {
                            locus_name: "локус 1",
                            locus_notes: "Описание блока 1",
                            locus_category: "бонус",
                            locus_backimg: "back_img_cat_1",
                            locus_card_code: "",
                            locus_card_name: "",
                            locus_card_image1: "",
                            locus_card_image2: "",
                            locus_points: 10,
                            locus_type: "тип 1",
                            cards: [
                                {                           
                                    category: "бонус",
                                    code: "C_BONUS_003",
                                    name: "монеты",
                                    image1: "C_BONUS_003",
                                    image2: "C_BONUS_003",
                                    notes: "",
                                    point: 10,
                                    takenotes: "положили карту 1",
                          
                                },
                                {
                                    category: "бонус",
                                    code: "C_BONUS_001",
                                    name: "неуязвимость",
                                    image1: "C_BONUS_001",
                                    image2: "C_BONUS_001",
                                    notes: "",
                                    point: -70,
                                    takenotes: "положили карту 18",
                          
                                },
                                {
                                    category: "бонус",
                                    code: "C_BONUS_005",
                                    name: "персональная тренировка",
                                    image1: "C_BONUS_005",
                                    image2: "C_BONUS_005",
                                    notes: "",
                                    point: -50,
                                    takenotes: "положили карту 6",
       
                                }
                            ]
                },
                {
                            locus_name: "локус 2",
                            locus_notes: "Описание блока 1",
                            locus_category: "виды восстановления",
                            locus_backimg: "back_img_cat_2",
                            locus_card_code: "",
                            locus_card_name: "",
                            locus_card_image1: "",
                            locus_card_image2: "",
                            locus_points: 15,
                            locus_type: "тип 1",
                            cards: [
                                {
                                    category: "виды восстановления",
                                    code: "C_SPA004",
                                    name: "баня",
                                    image1: "C_SPA004",
                                    image2: "C_SPA004",
                                    notes: "Дл любителей парилки. Но не может заменить сауну.",
                                    point: -20,
                                    takenotes: "положили карту 10" ,
                   
                                },
                                {
                                    category: "виды восстановления",
                                    code: "C_SPA001",
                                    name: "массаж",
                                    image1: "C_SPA001",
                                    image2: "C_SPA001",
                                    notes: "Восстанавливает после тренировок, улучшает здоровье",
                                    point: 50,
                                    takenotes: "положили карту 12",
    
                                }
                            ]
                 }
                    ]
                },
                {
                    name: "Блок 2",
                    notes: "Описание блока 2",
                    locuses: [
                {
                            locus_name: "локус 3",
                            locus_notes: "Описание блока 2",
                            locus_category: "виды диет",
                            locus_backimg: "back_img_cat_3",
                            locus_card_code: "",
                            locus_card_name: "",
                            locus_card_image1: "",
                            locus_card_image2: "",
                            locus_points: 0,
                            locus_type: "тип 1",
                            cards: [
                                {
                                    category: "виды диет",
                                    code: "C_DIET005",
                                    name: "ДИЕТА ДЛЯ СИЛОВЫХ ВИДОВ СПОРТА",
                                    image1: "C_DIET005",
                                    image2: "C_DIET005",
                                    notes: "Нужно есть много и часто. Причем спортивное питание. Спортсмены от такой диеты становятся сильнее, Но нельзя толстеть.",
                                    point: -20,
                                    takenotes: "положили карту 10",
    
                                },
                                {
                                    category: "виды диет",
                                    code: "C_DIET004",
                                    name: "ДИЕТА ДЛЯ ЦИКЛИЧЕСКИХ ВИДОВ СПОРТА",
                                    image1: "C_DIET004",
                                    image2: "C_DIET004",
                                    notes: "Нужно есть много и часто, но не толстеть. Чтобы были силы, но только на спорт.",
                                    point: 50,
                                    takenotes: "положили карту 15",
     
                                },
                                {
                                    category: "виды диет",
                                    code: "C_DIET006",
                                    name: "ДИЕТА ДЛЯ ИГРОВЫХ ВИДОВ СПОРТА",
                                    image1: "C_DIET006",
                                    image2: "C_DIET006",
                                    notes: "Нужно есть много и часто. Но при этом не толстеть и лучше играть.",
                                    point: 50,
                                    takenotes: "положили карту 16",
     
                                }
                            ]
                },
                {
                            locus_name: "локус 4",
                            locus_notes: "Описание блока 2",
                            locus_category: "виды спорта",
                            locus_backimg: "back_img_cat_5",
                            locus_card_code: "",
                            locus_card_name: "",
                            locus_card_image1: "",
                            locus_card_image2: "",
                            locus_points: 0,
                            locus_type: "тип 1",
                            cards: [
                                {
                                    category: "виды спорта",
                                    code: "C_SPORT001",
                                    name: "плавание",
                                    image1: "C_SPORT001",
                                    image2: "C_SPORT001",
                                    notes: "",
                                    point: 20,
                                    takenotes: "положили карту 11",
   
                                },
                                {
                                    category: "виды спорта",
                                    code: "C_SPORT005",
                                    name: "гребля",
                                    image1: "C_SPORT005",
                                    image2: "C_SPORT005",
                                    notes: "",
                                    point: -20,
                                    takenotes: "положили карту 10",

                                }
                            ]
                },
                {
                            locus_name: "локус 5",
                            locus_notes: "Описание блока 2",
                            locus_category: "виды фитнеса",
                            locus_backimg: "back_img_cat_6",
                            locus_card_code: "",
                            locus_card_name: "",
                            locus_card_image1: "",
                            locus_card_image2: "",
                            locus_points: 0,
                            locus_type: "тип 1",
                            cards: [
                                {
                                    category: "виды фитнеса",
                                    code: "C_FIT011",
                                    name: "Кроссфит",
                                    image1: "C_FIT011",
                                    image2: "C_FIT011",
                                    notes: "Прекрасный вид соревнований для подготовленных атлетов. Новичков и случайно зашедших калечит.",
                                    point: 10,
                                    takenotes: "положили карту 11",
 
                                },
                                {
                                      category: "виды фитнеса",
                                      code: "C_FIT011",
                                      name: "Кроссфит",
                                      image1: "C_FIT011",
                                      image2: "C_FIT011",
                                      notes: "Прекрасный вид соревнований для подготовленных атлетов. Новичков и случайно зашедших калечит.",
                                      point: 10,
                                      takenotes: "положили карту 11",
   
                                  }
                            ]
                 }
                    ]
                },
                {
                    name: "Блок 3",
                    notes: "Описание блока 3",
                    locuses: [
                {
                            locus_name: "локус 6",
                            locus_notes: "Описание блока 3",
                            locus_category: "гимнастика",
                            locus_backimg: "back_img_cat_7",
                            locus_card_code: "",
                            locus_card_name: "",
                            locus_card_image1: "",
                            locus_card_image2: "",
                            locus_points: 0,
                            locus_type: "тип 1",
                            cards: [
                                {
                                    category: "гимнастика",
                                    code: "C_EX_G011",
                                    name: "подъем ног сидя",
                                    image1: "C_EX_G011",
                                    image2: "C_EX_G011_1",
                                    notes: "Для  подготовленных. Укрепляет пресс.",
                                    point: 60,
                                    takenotes: "положили карту 16",
 
                                },
                                {
                                    category: "гимнастика",
                                    code: "C_EX_G014",
                                    name: "ролик для пресса",
                                    image1: "C_EX_G014",
                                    image2: "C_EX_G014",
                                    notes: "Для опытных. Работают интенсивно мышцы ног, рук, туловища.",
                                    point: 40,
                                    takenotes: "положили карту 11",
        id: 2
                                }
                            ]
                },
                {
                            locus_name: "локус 7",
                            locus_notes: "Описание блока 3",
                            locus_category: "маршрут здоровья",
                            locus_backimg: "back_img_cat_11",
                            locus_card_code: "",
                            locus_card_name: "",
                            locus_card_image1: "",
                            locus_card_image2: "",
                            locus_points: 0,
                            locus_type: "тип 1",
                            cards: [
                                {
                                    category: "маршрут здоровья",
                                    code: "C_ROAD_MZ009",
                                    name: "ФИТНЕС-МАРШРУТ",
                                    image1: "C_ROAD_MZ009",
                                    image2: "C_ROAD_MZ009",
                                    notes: "На данном маршруте Аватар становится красивым, выносливым и сильным. Закладывает прочный фундамент долгой жизни и успехов в построении карьеры.",
                                    point: 20,
                                    takenotes: "положили карту 11",
  
                                },
                                {
                                    category: "маршрут здоровья",
                                    code: "C_ROAD_MZ002",
                                    name: "ЗДОРОВЫЕ ЛЕГКИЕ",
                                    image1: "C_ROAD_MZ002",
                                    image2: "C_ROAD_MZ002",
                                    notes: "На данном переходе улучшается функция легких. Если не решить проблему — может пострадать сердце Аватара.",
                                    point: -10,
                                    takenotes: "положили карту 10",
  
                                },
                                {
                                      category: "маршрут здоровья",
                                      code: "C_ROAD_MZ002",
                                      name: "ЗДОРОВЫЕ ЛЕГКИЕ",
                                      image1: "C_ROAD_MZ002",
                                      image2: "C_ROAD_MZ002",
                                      notes: "На данном переходе улучшается функция легких. Если не решить проблему — может пострадать сердце Аватара.",
                                      point: -10,
                                      takenotes: "положили карту 10",

                                  }
                            ]
                },
                {
                            locus_name: "локус 8",
                            locus_notes: "Описание блока 3",
                            locus_category: "линии ТКМ",
                            locus_backimg: "back_img_cat_10",
                            locus_card_code: "",
                            locus_card_name: "",
                            locus_card_image1: "",
                            locus_card_image2: "",
                            locus_points: 0,
                            locus_type: "тип 1",
                            cards: [
                                {
                                    category: "линии ТКМ",
                                    code: "C_TKM_LIN010",
                                    name: "МЕРИДИАН ПЕЧЕНИ",
                                    image1: "C_TKM_LIN010",
                                    image2: "C_TKM_LIN010",
                                    notes: "",
                                    point: 20,
                                    takenotes: "положили карту 12",

                                },
                                {
                                    category: "линии ТКМ",
                                    code: "C_TKM_LIN014",
                                    name: "МЕРИДИАН МОЧЕВОГО ПУЗЫРЯ",
                                    image1: "C_TKM_LIN014",
                                    image2: "C_TKM_LIN014",
                                    notes: "",
                                    point: 40,
                                    takenotes: "положили карту 13",

                                }
                            ]
                },
                {
                            locus_name: "локус 9",
                            locus_notes: "Описание блока 3",
                            locus_category: "органы",
                            locus_backimg: "back_img_cat_14",
                            locus_card_code: "",
                            locus_card_name: "",
                            locus_card_image1: "",
                            locus_card_image2: "",
                            locus_points: 0,
                            locus_type: "тип 1",
                            cards: [
                                {
                                    category: "органы",
                                    code: "C_ORG_0RG010",
                                    name: "ЖЕЛЧНЫЙ ПУЗЫРЬ",
                                    image1: "C_ORG_0RG010",
                                    image2: "C_ORG_0RG010",
                                    notes: "",
                                    point: 10,
                                    takenotes: "положили карту 14",
                                }
                            ]
                 }
                    ]
                }
            ]
        }
      
    },
    mutations: {
      SET_OBJECT: (state, payload) => {
        state.object = payload;
    },
    },
    actions: {},
    getters: {
        OBJECT (state) {
            return state.object
      } 
    }
  }