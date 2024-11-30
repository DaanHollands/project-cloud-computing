package be.kuleuven.restaurantapi.services;

import be.kuleuven.restaurantapi.model.Reservation;
import be.kuleuven.restaurantapi.repositories.ReservationRepository;

import java.time.LocalDateTime;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;

public class ReservationService {
    private final ReservationRepository repo;

    @Autowired
    public ReservationService(ReservationRepository repo) {
        this.repo = repo;
    }

    public Reservation createReservation(Long tableId, Long userId, LocalDateTime dateTime, Integer duration, Integer numberOfPersons) {
        Reservation reservation = new Reservation();
        reservation.setTableId(tableId);
        reservation.setUserId(userId);
        reservation.setDateTime(dateTime);
        reservation.setDuration(duration);
        reservation.setNumberOfPersons(numberOfPersons);
        return repo.save(reservation);
    }

    public List<Reservation> findByTableId(Long tableId) {
        return repo.findByTableId(tableId);
    };

    public List<Reservation> findByTableIdAndDateTime(Long tableId, LocalDateTime startDateTime, LocalDateTime endDateTime) {
        return repo.findByTableIdAndDateTimeBetween(tableId, startDateTime, endDateTime);
    };
}
