package be.kuleuven.restaurantapi.services;

import be.kuleuven.restaurantapi.model.Reservation;
import be.kuleuven.restaurantapi.repositories.ReservationRepository;

import java.time.ZonedDateTime;
import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class ReservationService {
    private final ReservationRepository repo;

    @Autowired
    public ReservationService(ReservationRepository repo) {
        this.repo = repo;
    }

    public Reservation createReservation(Long tableId, Long userId, ZonedDateTime dateTime, Integer duration, Integer numberOfPersons) {
        Reservation reservation = new Reservation();
        reservation.setTableId(tableId);
        reservation.setUserId(userId);
        reservation.setDateTime(dateTime);
        reservation.setDuration(duration);
        reservation.setNumberOfPersons(numberOfPersons);
        return repo.save(reservation);
    }

    public Optional<Reservation> findById(Long id) {
        return repo.findById(id);
    }

    public List<Reservation> findByTableId(Long tableId) {
        return repo.findByTableId(tableId);
    };

    public List<Reservation> findByTableIdAndDateTime(Long tableId, ZonedDateTime startDateTime, ZonedDateTime endDateTime) {
        return repo.findByTableIdAndDateTimeBetween(tableId, startDateTime, endDateTime);
    };
}
