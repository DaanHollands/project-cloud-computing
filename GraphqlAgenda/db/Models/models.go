package dbModels

import "time"

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
