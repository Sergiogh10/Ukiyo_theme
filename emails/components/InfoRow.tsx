import { Row, Column, Text } from '@react-email/components';
import * as React from 'react';
import { theme } from '../styles/theme';

interface InfoRowProps {
  label: string;
  value: React.ReactNode;
  last?: boolean;
}

export const InfoRow = ({ label, value, last = false }: InfoRowProps) => {
  return (
    <Row style={{ ...rowStyle, borderBottom: last ? 'none' : `1px solid ${theme.colors.border}` }}>
      <Column style={labelColumn}>
        <Text style={labelStyle}>{label}</Text>
      </Column>
      <Column style={valueColumn}>
        <Text style={valueStyle}>{value}</Text>
      </Column>
    </Row>
  );
};

const rowStyle = {
  padding: '12px 0',
  width: '100%',
};

const labelColumn = {
  width: '40%',
  verticalAlign: 'top',
};

const labelStyle = {
  margin: '0',
  fontSize: '14px',
  color: theme.colors.textSecondary,
  fontFamily: theme.fonts.main,
};

const valueColumn = {
  width: '60%',
  verticalAlign: 'top',
};

const valueStyle = {
  margin: '0',
  fontSize: '15px',
  color: theme.colors.textMain,
  fontWeight: '500',
  fontFamily: theme.fonts.main,
  textAlign: 'right' as const,
};

export default InfoRow;
