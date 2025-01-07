package be.kuleuven.restaurantapi.controller;

import java.time.ZonedDateTime;
import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import be.kuleuven.restaurantapi.model.Reservation;
import be.kuleuven.restaurantapi.services.ReservationService;

@RestController
@RequestMapping("/reservations")
public class ReservationController {
    private final ReservationService service;

    @Autowired
    public ReservationController(ReservationService service) {
        this.service = service;
    }

    @PostMapping
    public Reservation createReservation(Long tableId, Long userId, ZonedDateTime dateTime, Integer duration, Integer numberOfPersons) {
        return service.createReservation(tableId, userId, dateTime, duration, numberOfPersons);
    }

    @GetMapping("/{id}")
    public Optional<Reservation> findById(@PathVariable Long id) {
        return service.findById(id);
    }

    @GetMapping("/table/{tableId}")
    public List<Reservation> findByTableId(@PathVariable Long tableId) {
        return service.findByTableId(tableId);
    }

    @GetMapping("/table/{tableId}/dateTime")
    public List<Reservation> findByTableIdAndDateTime(@PathVariable Long tableId, ZonedDateTime startDateTime, ZonedDateTime endDateTime) {
        return service.findByTableIdAndDateTime(tableId, startDateTime, endDateTime);
    }
}
