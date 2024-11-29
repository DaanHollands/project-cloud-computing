package dbModels

import (
	"agenda/graph/model"
	"strconv"
	"time"
)

type AgendaEvent struct {
	ID          uint   `gorm:"primaryKey"`
	UserID      uint   `gorm:"index"`
	Title       string `gorm:"not null"`
	Description string `gorm:"type:text"`
	Year        uint   `gorm:"not null"`
	Month       uint   `gorm:"not null"`
	Day         uint   `gorm:"not null"`
	Hour        *uint  `gorm:"type:int"`
	Minute      *uint  `gorm:"type:int"`
	CreatedAt   time.Time
	UpdatedAt   time.Time
}

func GraphqlModelToGorm(event *model.AgendaEvent) AgendaEvent {
	return AgendaEvent{
		ID: func() uint {
			id, err := strconv.ParseUint(event.ID, 10, 64)
			if err != nil {
				panic(err)
			}
			return uint(id)
		}(),
		UserID:      uint(event.UserID),
		Title:       event.Title,
		Description: *event.Description,
		Year:        uint(event.Year),
		Month:       uint(event.Month),
		Day:         uint(event.Day),
		Hour: func(hour *int) *uint {
			if hour == nil {
				return nil
			}
			h := uint(*hour)
			return &h
		}(event.Hour),
		Minute: func(minute *int) *uint {
			if minute == nil {
				return nil
			}
			m := uint(*minute)
			return &m
		}(event.Minute),
	}
}

func GormToGraphqlModel(event *AgendaEvent) model.AgendaEvent {
	return model.AgendaEvent{
		ID:          strconv.FormatUint(uint64(event.ID), 10),
		UserID:      int(event.UserID),
		Title:       event.Title,
		Description: &event.Description,
		Year:        int(event.Year),
		Month:       int(event.Month),
		Day:         int(event.Day),
		Hour: func(hour *uint) *int {
			if hour == nil {
				return nil
			}
			h := int(*hour)
			return &h
		}(event.Hour),
		Minute: func(minute *uint) *int {
			if minute == nil {
				return nil
			}
			m := int(*minute)
			return &m
		}(event.Minute),
	}
}
