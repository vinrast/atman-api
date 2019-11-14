# Api Atman Systems Test  desenvolvida com Lumen PHP Framework



## Instalação

    1.- Clonar o repositório de https://github.com/vinrast/atman-api.git  
    2.- Instale as dependências necessárias com o comando "Composer Install"  
    3.- Configure a conexão do seu banco de dados no seu arquivo ".env"  

## Migrações e dados de teste

    Para criar tabelas e preenchê-las com dados de teste, você pode executar as migrações usando o comando "php artisan migrate --seed".  

## Iniciar o servidor

    Para iniciar o servidor de aplicativos, você precisa executar o seguinte comando no seu terminal: "php -S localhost:8000 -t public"  

## Usuário De Teste

    user: vinrast@gmail.com  
    pass: secret  

## Endpoints

### Login URL:(POST http://localhost:8000/api/auth/login)

Este método permite que você se autentique no aplicativo e obtenha um token e dados do usuário  

Parameters:

	"email": string (required | email) email do usuário solicitante, 
	"password": string (required) senha do usuário solicitante

Response: 200 

    body:{
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hdG1hbi1hcGkudGVzdFwvXC9hcGlcL2F1dGhcL2xvZ2luIiwiaWF0IjoxNTczNjkwOTc2LCJleHAiOjE1NzM2OTQ1NzYsIm5iZiI6MTU3MzY5MDk3NiwianRpIjoiM3BwWGVDbmVLVmhVUmJZNyIsInN1YiI6MSwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.6xY4tzCKtAmsJstsE_-4vDPO-IlgFCeK5rZWekfdSk0",
        "user": {
            "id": 1,
            "name": "Vincen Santaella",
            "email": "vinrast@gmail.com",
            "token": null,
            "avatar": null,
            "role_id": 1,
            "team_id": null,
            "boss_team": null,
            "created_at": "2019-11-12 05:43:12",
            "updated_at": "2019-11-12 05:45:00",
            "rol_name": "moderador",
            "team_name": null,
            "rol": {
            "id": 1,
            "name": "moderador",
            "created_at": "2019-11-12 05:43:12",
            "updated_at": "2019-11-12 05:43:12"
            }
        },
        "token_type": "bearer",
        "expires_in": 3600
        }
    }

Response: 401

    body:{
        "message": "Unauthorized"
    }


### Criar novos usuários URL:(POST http://localhost:8000/api/users/create)

    Este método permite criar um novo usuario.   

    header:{
        Authorization: Bearer TOKEN
    }

    Parameters:  

        "name": string (required) nome do usuário solicitante,    
        "email": string (required | email | unique ) email do usuário solicitante,  
        "password": string (required) senha do usuário solicitante,  
        "role_id":integer (required | 1:moderador, 2:tecnico) foreign key tabela roles  

Response: 200  

    body:{
        "name": "Yoel Molina",
        "email": "test@gmail.com",
        "role_id": 1,
        "updated_at": "2019-11-14 01:14:33",
        "created_at": "2019-11-14 01:14:33",
        "id": 3,
        "rol_name": "moderador",
        "team_name": null,
        "rol": {
            "id": 1,
            "name": "moderador",
            "created_at": "2019-11-12 05:43:12",
            "updated_at": "2019-11-12 05:43:12"
        },
        "team": {
            "status_name": null,
            "status": []
        }
    }

Response: 422    

    body:{
        "email": [
            "The email has already been taken."
        ]
    }


### listar usuários. URL:(GET http://localhost:8000api/users)

Este método permite listar usuários  

    header:{
        Authorization: Bearer TOKEN
    }

Response 200

    Body:
        [
        {
            "id": 1,
            "name": "Vincen Santaella",
            "email": "vinrast@gmail.com",
            "token": null,
            "avatar": null,
            "role_id": 1,
            "team_id": 1,
            "boss_team": 1,
            "created_at": "2019-11-12 05:43:12",
            "updated_at": "2019-11-12 05:45:00",
            "rol_name": "moderador",
            "team_name": "equipo 5",
            "rol": {
            "id": 1,
            "name": "moderador",
            "created_at": "2019-11-12 05:43:12",
            "updated_at": "2019-11-12 05:43:12"
            },
            "team": {
            "id": 1,
            "name": "equipo 5",
            "status_id": 4,
            "created_at": "2019-11-12 05:45:00",
            "updated_at": "2019-11-12 05:45:00",
            "status_name": "em serviço",
            "status": {
                "id": 4,
                "name": "em serviço",
                "family": 2,
                "created_at": "2019-11-12 05:43:12",
                "updated_at": "2019-11-12 05:43:12"
            }
            }
        },
        {
            "id": 3,
            "name": "Yoel Molina",
            "email": "test@gmail.com",
            "token": null,
            "avatar": null,
            "role_id": 1,
            "team_id": null,
            "boss_team": null,
            "created_at": "2019-11-14 01:14:33",
            "updated_at": "2019-11-14 01:14:33",
            "rol_name": "moderador",
            "team_name": null,
            "rol": {
            "id": 1,
            "name": "moderador",
            "created_at": "2019-11-12 05:43:12",
            "updated_at": "2019-11-12 05:43:12"
            },
            "team": {
            "status_name": null,
            "status": []
            }
        }
        ]


### Criar novas competencias. URL:(post http://localhost:8000/api/competitions/create)

Este método permite criar competencias.  


    header:{
        Authorization: Bearer TOKEN
    }

    Parameters:  
        "name": string (required | unique) nome da competencia,    

Response: 200

    body:{
        "name": "competencia 3",
        "updated_at": "2019-11-12 05:44:55",
        "created_at": "2019-11-12 05:44:55",
        "id": 3
    }

Response: 422
    body:{
        "name": [
            "The name has already been taken."
        ]
    }

### listar usuários. URL:(GET http://localhost:8000/api/competitions)

Este método permite listar competencias  

    header:{
        Authorization: Bearer TOKEN
    }

Response 200

    Body:
        [
            {
                "id": 1,
                "name": "competencia 1",
                "created_at": "2019-11-12 05:44:47",
                "updated_at": "2019-11-12 05:44:47"
            },
            {
                "id": 2,
                "name": "competencia 2",
                "created_at": "2019-11-12 05:44:51",
                "updated_at": "2019-11-12 05:44:51"
            },
            {
                "id": 3,
                "name": "competencia 3",
                "created_at": "2019-11-12 05:44:55",
                "updated_at": "2019-11-12 05:44:55"
            }
        ]

### Criar novos equipes URL:(POST http://localhost:8000/api/teams/create)

    Este método permite criar um novo equipe.   

    header:{
        Authorization: Bearer TOKEN
    }

    Parameters:  

        "name": string (required) nome do equipe,    
        "users": array (required|array|min:1 ) usuários de um equipe,  
        "competitions": array (required|array|min:1 ) competencias  de um equipe,  

Response: 200  

    body:[
    {
        "id": 1,
        "name": "equipo 5",
        "status_id": 4,
        "created_at": "2019-11-12 05:45:00",
        "updated_at": "2019-11-12 05:45:00",
        "status_name": "em serviço",
        "users": [],
        "competitions": [
        {
            "id": 1,
            "name": "competencia 1",
            "created_at": "2019-11-12 05:44:47",
            "updated_at": "2019-11-12 05:44:47",
            "pivot": {
            "team_id": 1,
            "competition_id": 1
            }
        },
        {
            "id": 2,
            "name": "competencia 2",
            "created_at": "2019-11-12 05:44:51",
            "updated_at": "2019-11-12 05:44:51",
            "pivot": {
            "team_id": 1,
            "competition_id": 2
            }
        },
        {
            "id": 3,
            "name": "competencia 3",
            "created_at": "2019-11-12 05:44:55",
            "updated_at": "2019-11-12 05:44:55",
            "pivot": {
            "team_id": 1,
            "competition_id": 3
            }
        }
        ],
        "status": {
        "id": 4,
        "name": "em serviço",
        "family": 2,
        "created_at": "2019-11-12 05:43:12",
        "updated_at": "2019-11-12 05:43:12"
        }
    },
    {
        "id": 2,
        "name": "equipo 6",
        "status_id": 5,
        "created_at": "2019-11-14 01:55:00",
        "updated_at": "2019-11-14 01:55:00",
        "status_name": "disponível",
        "users": [
        {
            "id": 1,
            "name": "Vincen Santaella",
            "email": "vinrast@gmail.com",
            "token": null,
            "avatar": null,
            "role_id": 1,
            "team_id": 2,
            "boss_team": 1,
            "created_at": "2019-11-12 05:43:12",
            "updated_at": "2019-11-14 01:55:00",
            "rol_name": "moderador",
            "team_name": "equipo 6",
            "rol": {
            "id": 1,
            "name": "moderador",
            "created_at": "2019-11-12 05:43:12",
            "updated_at": "2019-11-12 05:43:12"
            },
            "team": {
            "id": 2,
            "name": "equipo 6",
            "status_id": 5,
            "created_at": "2019-11-14 01:55:00",
            "updated_at": "2019-11-14 01:55:00",
            "status_name": "disponível",
            "status": {
                "id": 5,
                "name": "disponível",
                "family": 2,
                "created_at": "2019-11-12 05:43:12",
                "updated_at": "2019-11-12 05:43:12"
            }
            }
        },
        {
            "id": 2,
            "name": "Yoel Molina",
            "email": "admin@atman.com",
            "token": null,
            "avatar": null,
            "role_id": 1,
            "team_id": 2,
            "boss_team": 0,
            "created_at": "2019-11-12 05:43:31",
            "updated_at": "2019-11-14 01:55:00",
            "rol_name": "moderador",
            "team_name": "equipo 6",
            "rol": {
            "id": 1,
            "name": "moderador",
            "created_at": "2019-11-12 05:43:12",
            "updated_at": "2019-11-12 05:43:12"
            },
            "team": {
            "id": 2,
            "name": "equipo 6",
            "status_id": 5,
            "created_at": "2019-11-14 01:55:00",
            "updated_at": "2019-11-14 01:55:00",
            "status_name": "disponível",
            "status": {
                "id": 5,
                "name": "disponível",
                "family": 2,
                "created_at": "2019-11-12 05:43:12",
                "updated_at": "2019-11-12 05:43:12"
            }
            }
        }
        ],
        "competitions": [
        {
            "id": 1,
            "name": "competencia 1",
            "created_at": "2019-11-12 05:44:47",
            "updated_at": "2019-11-12 05:44:47",
            "pivot": {
            "team_id": 2,
            "competition_id": 1
            }
        },
        {
            "id": 2,
            "name": "competencia 2",
            "created_at": "2019-11-12 05:44:51",
            "updated_at": "2019-11-12 05:44:51",
            "pivot": {
            "team_id": 2,
            "competition_id": 2
            }
        },
        {
            "id": 3,
            "name": "competencia 3",
            "created_at": "2019-11-12 05:44:55",
            "updated_at": "2019-11-12 05:44:55",
            "pivot": {
            "team_id": 2,
            "competition_id": 3
            }
        }
        ],
        "status": {
        "id": 5,
        "name": "disponível",
        "family": 2,
        "created_at": "2019-11-12 05:43:12",
        "updated_at": "2019-11-12 05:43:12"
        }
    }
    ]

Response: 422    

    body:{
        "name": [
            "The name has already been taken."
        ]
    }


### listar equipes. URL:(GET http://localhost:8000/api/teams)

Este método permite listar equipes  

    header:{
        Authorization: Bearer TOKEN
    }

Response 200

    Body:[
        {
            "id": 1,
            "name": "equipo 5",
            "status_id": 4,
            "created_at": "2019-11-12 05:45:00",
            "updated_at": "2019-11-12 05:45:00",
            "status_name": "em serviço",
            "status": {
            "id": 4,
            "name": "em serviço",
            "family": 2,
            "created_at": "2019-11-12 05:43:12",
            "updated_at": "2019-11-12 05:43:12"
            }
        },
        {
            "id": 2,
            "name": "equipo 6",
            "status_id": 5,
            "created_at": "2019-11-14 01:55:00",
            "updated_at": "2019-11-14 01:55:00",
            "status_name": "disponível",
            "status": {
            "id": 5,
            "name": "disponível",
            "family": 2,
            "created_at": "2019-11-12 05:43:12",
            "updated_at": "2019-11-12 05:43:12"
            }
        }
    ]
        
### Criar novas chamadas URL:(POST http://localhost:8000/api/calls/create)

    Este método permite criar uma nova chamada.   

    header:{
        Authorization: Bearer TOKEN
    }

    Parameters:  
        "name": string (required) nome da chamada,    
        "team_id":integer (required) foreign key team,
        "deadline":integer (required) prazo,
        "position": string (required) latitude longitude da chamada,
        "address": string (required) endereço da chamada ,
        "description": string(required) descrição do caso,
        "competitions":array (required|array|min:1) competencias da chamada,
        "proposed_end":date (required | date) data proposta para acabar  

Response: 200  

    body:[
    {
        "id": 2,
        "name": "Chamada 1",
        "deadline": 6,
        "position": "lat:40.2524,long:-20.53534",
        "address": "Av Fernando Ferrari, Vitoria ES",
        "description": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.",
        "status_id": 1,
        "team_id": 1,
        "proposed_end": "2019-12-12 00:00:00",
        "final_date": null,
        "created_at": "2019-11-12 06:47:20",
        "updated_at": "2019-11-12 06:47:20",
        "status_name": "pendente",
        "date_form": "12 de December de 2019",
        "team_name": "equipo 5",
        "competitions": [
        {
            "id": 1,
            "name": "competencia 1",
            "created_at": "2019-11-12 05:44:47",
            "updated_at": "2019-11-12 05:44:47",
            "pivot": {
            "call_id": 2,
            "competition_id": 1
            }
        },
        {
            "id": 3,
            "name": "competencia 3",
            "created_at": "2019-11-12 05:44:55",
            "updated_at": "2019-11-12 05:44:55",
            "pivot": {
            "call_id": 2,
            "competition_id": 3
            }
        }
        ],
        "status": {
        "id": 1,
        "name": "pendente",
        "family": 1,
        "created_at": "2019-11-12 05:43:12",
        "updated_at": "2019-11-12 05:43:12"
        },
        "team": {
        "id": 1,
        "name": "equipo 5",
        "status_id": 4,
        "created_at": "2019-11-12 05:45:00",
        "updated_at": "2019-11-12 05:45:00",
        "status_name": "em serviço",
        "status": {
            "id": 4,
            "name": "em serviço",
            "family": 2,
            "created_at": "2019-11-12 05:43:12",
            "updated_at": "2019-11-12 05:43:12"
        }
        }
    },
    {
        "id": 3,
        "name": "Chamada 1",
        "deadline": 6,
        "position": "lat:40.2524,long:-20.53534",
        "address": "Av Fernando Ferrari, Vitoria ES",
        "description": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.",
        "status_id": 1,
        "team_id": 1,
        "proposed_end": "2019-12-12 00:00:00",
        "final_date": null,
        "created_at": "2019-11-14 02:04:33",
        "updated_at": "2019-11-14 02:04:33",
        "status_name": "pendente",
        "date_form": "12 de December de 2019",
        "team_name": "equipo 5",
        "competitions": [
        {
            "id": 1,
            "name": "competencia 1",
            "created_at": "2019-11-12 05:44:47",
            "updated_at": "2019-11-12 05:44:47",
            "pivot": {
            "call_id": 3,
            "competition_id": 1
            }
        },
        {
            "id": 3,
            "name": "competencia 3",
            "created_at": "2019-11-12 05:44:55",
            "updated_at": "2019-11-12 05:44:55",
            "pivot": {
            "call_id": 3,
            "competition_id": 3
            }
        }
        ],
        "status": {
        "id": 1,
        "name": "pendente",
        "family": 1,
        "created_at": "2019-11-12 05:43:12",
        "updated_at": "2019-11-12 05:43:12"
        },
        "team": {
        "id": 1,
        "name": "equipo 5",
        "status_id": 4,
        "created_at": "2019-11-12 05:45:00",
        "updated_at": "2019-11-12 05:45:00",
        "status_name": "em serviço",
        "status": {
            "id": 4,
            "name": "em serviço",
            "family": 2,
            "created_at": "2019-11-12 05:43:12",
            "updated_at": "2019-11-12 05:43:12"
        }
        }
    }
    ]

Response: 422    

    body:{
        "description": [
            "The description field is required."
        ]
    }

### listar chamadas. URL:(GET http://localhost:8000/api/calls)

Este método permite listar chamadas 

    header:{
        Authorization: Bearer TOKEN
    }

Response 200

    Body:{
    "data": [
        {
        "id": 2,
        "name": "Chamada 1",
        "deadline": 6,
        "position": "lat:40.2524,long:-20.53534",
        "address": "Av Fernando Ferrari, Vitoria ES",
        "description": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.",
        "status_id": 1,
        "team_id": 1,
        "proposed_end": "2019-12-12 00:00:00",
        "final_date": null,
        "created_at": "2019-11-12 06:47:20",
        "updated_at": "2019-11-12 06:47:20",
        "status_name": "pendente",
        "date_form": "12 de December de 2019",
        "team_name": "equipo 5",
        "competitions": [
            {
            "id": 1,
            "name": "competencia 1",
            "created_at": "2019-11-12 05:44:47",
            "updated_at": "2019-11-12 05:44:47",
            "pivot": {
                "call_id": 2,
                "competition_id": 1
            }
            },
            {
            "id": 3,
            "name": "competencia 3",
            "created_at": "2019-11-12 05:44:55",
            "updated_at": "2019-11-12 05:44:55",
            "pivot": {
                "call_id": 2,
                "competition_id": 3
            }
            }
        ],
        "status": {
            "id": 1,
            "name": "pendente",
            "family": 1,
            "created_at": "2019-11-12 05:43:12",
            "updated_at": "2019-11-12 05:43:12"
        },
        "team": {
            "id": 1,
            "name": "equipo 5",
            "status_id": 4,
            "created_at": "2019-11-12 05:45:00",
            "updated_at": "2019-11-12 05:45:00",
            "status_name": "em serviço",
            "status": {
            "id": 4,
            "name": "em serviço",
            "family": 2,
            "created_at": "2019-11-12 05:43:12",
            "updated_at": "2019-11-12 05:43:12"
            }
        }
        }
    ]
    }