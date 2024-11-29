package db

import (
	dbModels "agenda/Models"
	"log"

	"gorm.io/driver/postgres"
	"gorm.io/gorm"
)

var DB *gorm.DB

func ConnectDataBase() {
	dsn := "host=postgres user=postgres password=postgres dbname=graphql_agenda_database port=5432 sslmode=disable TimeZone=UTC" //Connect to postgres database inside docker
	var err error
	DB, err = gorm.Open(postgres.Open(dsn), &gorm.Config{})
	if err != nil {
		log.Fatalf("Couldn't connect to database!")
	}
	log.Println("Connected to Database!")
	DB.AutoMigrate(&dbModels.AgendaEvent{})
}
