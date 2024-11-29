package dbModels

import (
	"agenda/graph/model"
	"strconv"
	"time"
)

type AgendaEvent struct {
	ID          uint   `gorm:"primaryKey"`
	UserID      uint   `gorm:"index"`
	DoctorID    uint   `gorm:"not null"`
	Title       string `gorm:"not null"`
	Description string `gorm:"type:text"`
	Year        uint   `gorm:"not null"`
	Month       uint   `gorm:"not null"`
	Day         uint   `gorm:"not null"`
	HourBegin   uint   `gorm:"not null"`
	MinuteBegin uint   `gorm:"not null"`
	HourEnd     uint   `gorm:"not null"`
	MinuteEnd   uint   `gorm:"not null"`
	CreatedAt   time.Time
	UpdatedAt   time.Time
}

func uintToIntPtr(u *uint) *int {
	if u == nil {
		return nil
	}
	i := int(*u)
	return &i
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
		DoctorID:    uint(event.DoctorID),
		Title:       event.Title,
		Description: *event.Description,
		Year:        uint(event.Date.Year),
		Month:       uint(event.Date.Month),
		Day:         uint(event.Date.Day),
		HourBegin:   uint(event.TimeBegin.Hour),
		MinuteBegin: uint(event.TimeBegin.Minute),
		HourEnd:     uint(event.TimeEnd.Hour),
		MinuteEnd:   uint(event.TimeEnd.Minute),
	}
}

func GormToGraphqlModel(event *AgendaEvent) model.AgendaEvent {
	return model.AgendaEvent{
		ID:          strconv.FormatUint(uint64(event.ID), 10),
		UserID:      int(event.UserID),
		DoctorID:    int(event.DoctorID),
		Title:       event.Title,
		Description: &event.Description,
		Date: &model.Date{
			Year:  int(event.Year),
			Month: int(event.Month),
			Day:   int(event.Day),
		},
		TimeBegin: &model.Time{
			Hour:   *uintToIntPtr(&event.HourBegin),
			Minute: *uintToIntPtr(&event.MinuteBegin),
		},
		TimeEnd: &model.Time{
			Hour:   *uintToIntPtr(&event.HourEnd),
			Minute: *uintToIntPtr(&event.MinuteEnd),
		},
	}
}
