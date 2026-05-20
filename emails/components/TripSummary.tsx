import { Section } from '@react-email/components';
import * as React from 'react';
import { theme } from '../styles/theme';
import InfoRow from './InfoRow';

interface TripSummaryProps {
  destination: string;
  departureDate: string;
  returnDate: string;
  travelersCount: number;
}

export const TripSummary = ({ destination, departureDate, returnDate, travelersCount }: TripSummaryProps) => {
  return (
    <Section style={containerStyle}>
      <InfoRow label="Destino" value={destination} />
      <InfoRow label="Ida" value={departureDate} />
      <InfoRow label="Vuelta" value={returnDate} />
      <InfoRow label="Viajeros" value={`${travelersCount} personas`} last />
    </Section>
  );
};

const containerStyle = {
  backgroundColor: theme.colors.surface,
  padding: '16px 24px',
  borderRadius: theme.radius.md,
  border: `1px solid ${theme.colors.border}`,
  margin: '24px 0',
};

export default TripSummary;
